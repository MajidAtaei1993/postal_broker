import { UsersService } from "@/services/users";
import { User } from "@/types";
import { defineStore } from "pinia";

export const useUserStore = defineStore('users',{
    state: () => ({
        users: [] as User[]
    }),
    getters:{},
    actions:{

        async allUsers(){
            try {
                const data = await UsersService.fetchUsers()
                if (data) {
                    this.users = data;
                }
            } catch (error) {
                return error
            }
        }
    }
})