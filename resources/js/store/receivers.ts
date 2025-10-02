import { ReceiversServices } from "@/services/receivers";
import { SendersReceiverJson } from "@/types";
import { defineStore } from "pinia";

export const useReceiversStore = defineStore('receivers',{
    state: () => ({
        receivers: [] as SendersReceiverJson[]
    }),
    getters:{},
    actions:{

        async allReceivers(){
            try {
                const { data, error } = await ReceiversServices.fetchReceivers()
                if (data) {
                    this.receivers = data
                }
            } catch (error) {
                return error
            }
        }
    }
})