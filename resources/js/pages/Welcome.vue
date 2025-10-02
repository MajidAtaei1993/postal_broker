<template>
    <div class="Welcome">
        <v-toolbar title="Tracking Shipments" rounded>
            <v-toolbar-items>
                <NewShipment />
            </v-toolbar-items>
        </v-toolbar>


    </div>
</template>

<script setup lang="ts">
import { onMounted, reactive } from 'vue';
import { useShipmentStore } from '@/store/shipment';
const store = useShipmentStore()

// components
import NewShipment from '@/components/shipment/Create.vue'

const state = reactive({
    tab: 0
})

onMounted(async() =>{
    await store.loadShipments()
})
const storeShipment = function(){
    
}
</script>

<style lang="scss" scoped>
.Welcome {
    display: flex;
    flex-direction: column;
    align-items: center;
    padding: 5% 15%;
}
</style>