import { defineStore } from "pinia";
import { ShipmentService } from "@/services/shipments";
import type { ShipmentJson } from '@/types/index'

export const useShipmentStore = defineStore('shipment', {
    state: () => ({
        shipments: [] as ShipmentJson[],
    }),
    getters: {
        shipmentCount: (state) => state.shipments.length,
    },
    actions: {
        // Fetch all shipments from API
        async loadShipments() {
            try {
                const { data } = await ShipmentService.fetchShipments();
                if (data) {
                    this.shipments.push(data);
                }
            } catch (err: any) {
                console.error('Error loading shipments:', err.message);
            }
        },

        // Store a new shipment and add it to state
        async addShipment(payload: ShipmentJson) {
            try {
                const { data, error } = await ShipmentService.storeShipment(payload);
                if (data) this.shipments.push(data);
            } catch (err: any) {
                console.error('Error adding shipment:', err.message);
            }
        },
    }
});
