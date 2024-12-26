<template>
    <div>
        <h1>Kategoriler</h1>
        <div v-if="loading">Yükleniyor...</div>
        <ul v-else>
            <li v-for="category in categories" :key="category.id">
                <strong>{{ category.name }}</strong>
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
                const response = await axios.get('/api/kategori/kategoriler'); // Doğru API rotası
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
