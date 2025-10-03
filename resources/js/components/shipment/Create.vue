<template>
    <v-dialog v-model="state.dialog" @after-leave="state.shipment = {}" persistent>
        <!-- this slot use for btn insted of dialog -->
        <template #activator>
            <v-btn @click="state.dialog = true" append-icon="mdi-plus" color="primary">add new</v-btn>
        </template>
        <v-card class="v-col-12 v-col-lg-5 v-col-md-6 v-col-sm-11 ma-auto pa-0">
            <!-- card dialog -->
            <v-toolbar title="Create new shipment">
                <v-toolbar-items>
                    <v-btn @click="state.dialog = false" color="error">close dialog</v-btn>
                </v-toolbar-items>
            </v-toolbar>

            <!-- content -->
            <v-card-text>
                <v-row class="ma-0">
                    <v-col cols="12" md="5" class="pa-2">
                        <v-select label="Sender" v-model="state.shipment.sender" :items="useStore.users" item-title="full_name" item-value="id" variant="outlined" hide-details>
                        </v-select>
                    </v-col>
                    <v-col cols="12" md="7" class="pa-2">
                        <v-select label="Receiver" v-model="state.shipment.receiver" :items="useStore.users" item-title="full_name" item-value="id" variant="outlined" hide-details>
                            <template #append>
                                <CreateUser />
                            </template>
                        </v-select>
                    </v-col>
                    <v-col cols="12" md="6" class="pa-2">
                        <v-select label="Status" v-model="state.shipment.status" :items="state.status" item-title="full_name" item-value="id" variant="outlined" hide-details></v-select>
                    </v-col>
                    <v-col cols="12" md="6" class="pa-2">
                        <v-select label="Service Type" v-model="state.shipment.service_type" :items="state.serviceTypes" item-title="full_name" item-value="id" variant="outlined" hide-details></v-select>
                    </v-col>
                    <v-col cols="12" class="pa-2">
                        <v-select label="Packages"  v-model="state.shipment.packages" multiple :items="packagesStore.packages" item-title="package_type" item-value="id" variant="outlined" hide-details>
                            <template #append>
                                <v-btn icon="mdi-plus" color="primary" rounded></v-btn>
                            </template>
                        </v-select>
                    </v-col>
                    <v-col cols="12">
                        <v-textarea label="Decription" v-model="state.shipment.desciption" variant="outlined" hide-details></v-textarea>
                    </v-col>
                </v-row>
            </v-card-text>
            <v-card-actions>
                <v-btn block color="primary" @click="saveAll" :disabled="checkInputs">save all</v-btn>
            </v-card-actions>
        </v-card>
    </v-dialog>
</template>

<script setup lang="ts">
import { ref, reactive, computed, onMounted, watch } from 'vue'
import CreateUser from '@/components/user/Create.vue'

import { useUserStore } from '@/store/users'
import { usePackagesStore } from '@/store/packages'
const useStore = useUserStore()
const packagesStore = usePackagesStore()

const state = reactive({
   dialog: false,
   shipment: {
        sender: null,
        receiver: null,
        packages: [],
        status: '',
        service_type: '',
        desciption: ''
   },
   serviceTypes:[
       'pending',
       'shipped',
       'delivered'
   ],
   status:[
       'standard',
       'express',
       'priority',
       'international'
   ]
})

const saveAll = () =>{
    
}

watch(
    () => state.dialog,
    async (n, o) => {
        if(n === true)
        await useStore.allUsers()
        await packagesStore.allPackages()
    }
)

const checkInputs = computed(() => {
    const shipment = state.shipment

    if (!shipment.sender) return true
    if (!shipment.receiver) return true

    if (!shipment.packages || shipment.packages.length === 0) return true

    if (!shipment.status) return true
    if (!shipment.service_type) return true

    if (!shipment.desciption || shipment.desciption.trim() === '') return true

    return false
})

</script>

<style lang="scss" scoped>
</style>