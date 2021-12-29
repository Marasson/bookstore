import { createRouter, createWebHistory } from 'vue-router'

import BooksIndex from '../components/books/BooksIndex.vue'
import BooksCreate from '../components/books/BooksCreate.vue'
import BooksEdit from '../components/books/BooksEdit.vue'


const routes = [
    {
        path: '/booksvue',
        name: 'books.index',
        component: BooksIndex
    },
    {
        path: '/booksvue/create',
        name: 'books.create',
        component: BooksCreate
    },
    {
        path: '/books/:id/edit',
        name: 'books.edit',
        component: BooksEdit,
        props: true
    },
];

export default createRouter({
    history: createWebHistory(),
    routes
})