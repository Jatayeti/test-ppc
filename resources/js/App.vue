<template>
    <div class="min-h-screen bg-gray-100 flex items-center justify-center p-4">
        <price-calculator />
    </div>
</template>

<script>
import PriceCalculator from "@/components/PriceCalculator.vue";

export default {
    components: {PriceCalculator},
}
</script>
