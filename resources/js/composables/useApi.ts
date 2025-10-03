// composables/useApi.ts
const baseUrl = 'http://postal_broker.test/api/'

export async function useApi<T = any>( endpoint: string, { method = 'GET', body = null }: { method?: string; body?: any } = {} ): 
    Promise<{ data?: T; meta?: any; error?: any }> {
    try {
        const url = `${baseUrl}${endpoint}`

        const headers: HeadersInit = {
            'Accept': 'application/json',
            'Content-Type': 'application/json',
        }

        const options: RequestInit = {
            method,
            headers,
            body: body ? JSON.stringify(body) : undefined,
        }

        const response = await fetch(url, options)

        if (!response.ok) {
            const errorData = await response.json()
            return { error: errorData }
        }

        const result = await response.json()
        
        if (result.data !== undefined) {
            return { data: result.data, meta: result.meta }
        }
        
        return { data: result }
    } catch (error) {
        return { error }
    }
}
