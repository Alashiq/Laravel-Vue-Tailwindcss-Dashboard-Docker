import { defineStore } from 'pinia'

export const useAuthStore = defineStore({
  id: 'auth',
  state: () => ({
    auth: false
  }),
  getters: {
    notAuth: (state) => !state.auth
  },
  actions: {
    change() {
      this.auth=!this.auth
    }
  }
})
