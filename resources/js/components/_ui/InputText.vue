<script>
export default {
    name: "InputText",
    props: {
        modelValue: {
            type: String,
            default: ""
        },
        label: {
            type: String,
            default: ""
        },
        error: {
            type: String,
            default: ""
        },
        placeholder: {
            type: String,
            default: ""
        }
    },
    emits: ['update:modelValue']
}
</script>

<template>
    <div class="input-text">
        <label
            v-if="label"
            for="tax_number"
            class="block text-sm font-medium text-gray-700"
        >
            {{ label }}
        </label>

        <input
            id="tax_number"
            type="text"
            class="mt-1 block w-full bg-white border border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-2 focus:ring-indigo-500 outline-0 px-2 py-3"
            :placeholder="placeholder"
            :value="modelValue"
            @input="$emit('update:modelValue', $event.target.value)"
        >
        <span
            class="text-sm text-red-700"
            v-if="error"
        >
            {{ error }}
        </span>
    </div>
</template>

<style>

</style>
