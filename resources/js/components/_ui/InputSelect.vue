<script>
export default {
    name: "InputSelect",
    props: {
        modelValue: {
            type: String,
            default: ""
        },
        id: {
            type: String,
            default: ""
        },
        label: {
            type: String,
            default: ""
        },
        placeholder: {
            type: String,
            default: ""
        },
        options: {
            type: Array,
            default: []
        },
        error: {
            type: String,
            default: ""
        },
        propToShow: {
            type: String,
            default: "name"
        },
        propToValue: {
            type: String,
            default: ""
        }
    },
    emits: ['update:modelValue']
}
</script>

<template>
    <div class="input-select">
        <label
            v-if="label"
            :for="id"
            class="block text-sm font-medium text-gray-700"
        >
            {{ label }}
        </label>

        <select
            :id="id"
            class="mt-1 block w-full bg-white border border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-2 focus:ring-indigo-500 outline-0 px-2 py-3"
            @change="$emit('update:modelValue', $event.target.value)"
        >
            <option value="">{{placeholder || label}}</option>
            <option
                v-for="(item, i) in options"
                :key="`${id}-${i}`"
                :value="propToValue ? item[propToValue] : item"
            >
                {{ item[propToShow] }}
            </option>
        </select>
        <span
            class="text-sm text-red-700"
            v-if="error"
        >
            {{ error }}
        </span>
    </div>
</template>

<style scoped>

</style>
