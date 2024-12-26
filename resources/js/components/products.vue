<template>
    <div>
        <h1>Ürünler</h1>
        <div v-if="loading">Yükleniyor...</div>
        <ul v-else>
            <li v-for="product in categories" :key="product.id">
                <strong>{{ product.name }}</strong>
            </li>
        </ul>
    </div>
</template>

<script>
import axios from 'axios';

export default {
    data() {
        return {
            categories: [], // Kategorileri saklamak için boş bir dizi
            loading: true,  // Yüklenme durumu
        };
    },
    created() {
        this.fetchCategories();
    },
    methods: {
        async fetchCategories() {
            try {
                const response = await axios.get('/api/ürünler/ürünler'); // Doğru API rotası
                this.categories = response.data; // Dönen veriyi categories'e ata
            } catch (error) {
                console.error("Kategoriler alınırken hata oluştu:", error.response?.data || error.message);
            } finally {
                this.loading = false;
            }
        },
    },
};
</script>

<style scoped>
ul {
    list-style-type: none;
    padding: 0;
}
li {
    margin-bottom: 10px;
}
</style>
