<script>
    import InputText from "@/components/_ui/InputText.vue";
    import InputSelect from "@/components/_ui/InputSelect.vue";
    import {calculatePrice, getProducts} from "@/api.js";

    export default {
        name: 'PriceCalculator',
        components: {InputSelect, InputText},
        data() {
            return {
                products: [],
                form: {
                    product_id: '',
                    tax_number: ''
                },
                result: null,
                error: null,
                errors: null,
            }
        },
        mounted() {
            this.loadProducts();
        },
        methods: {
            async loadProducts() {
                try {
                    const data = await getProducts();
                    this.products = data.data;
                } catch (error) {
                    this.error = 'Failed to load products';
                }
            },
            async calculatePrice() {
                try {
                    this.form.tax_number = this.form.tax_number.toUpperCase();
                    this.result = await calculatePrice(this.form.product_id, this.form.tax_number);
                    this.error = null;
                } catch (error) {
                    this.error = error.response?.data?.error || 'Calculation failed';
                    this.errors = error.response?.data?.errors
                    this.result = null;
                }
            }
        }
    }
</script>

<template>
    <div class="price-calculator bg-white shadow-lg rounded-lg p-8 w-full max-w-md">
        <h1 class="text-2xl font-bold text-center mb-6">Price Calculator</h1>

        <div v-if="error" class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
            {{ error }}
        </div>

        <div v-if="result" class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
            Final price for {{ result.product }} in {{ result.country }}: <span class="font-bold">€{{ result.price }}</span>
        </div>

        <form @submit.prevent="calculatePrice" class="space-y-4">
            <input-select
                v-model="form.product_id"
                label="Выберите продукт"
                prop-to-value="id"
                prop-to-show="label"
                :options="products"
                :error="errors && errors.product_id[0]"
            />

            <input-text
                v-model="form.tax_number"
                label="Налоговый номер"
                placeholder="DE123456789"
                :error="errors && errors.tax_number[0]"
            />

            <button type="submit" class="w-full bg-indigo-600 text-white py-2 px-4 rounded-md hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                Рассчитать цену
            </button>
        </form>
    </div>
</template>

<style>
    .price-calculator {
        .input-text {
            input {
                text-transform: uppercase;
            }
        }
    }
</style>
