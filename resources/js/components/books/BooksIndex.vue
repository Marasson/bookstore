<template>
    <div class="overflow-hidden overflow-x-auto min-w-full align-middle sm:rounded-md">
        <div class="flex place-content-end mb-4">
            <div class="px-4 py-2 text-white bg-indigo-600 hover:bg-indigo-700 cursor-pointer">
                <router-link :to="{ name: 'books.create' }" class="text-sm font-medium">ADD BOOK</router-link>
            </div>
        </div>

        <table class="min-w-full border divide-y divide-gray-200">
            <thead>
            <tr>
                <th class="px-6 py-3 bg-gray-50">
                    <span
                        class="text-lg font-medium tracking-wider leading-4 text-left text-gray-500 uppercase">TITLE</span>
                </th>
                <th class="px-6 py-3 bg-gray-50">
                    <span
                        class="text-lg font-medium tracking-wider leading-4 text-left text-gray-500 uppercase">DESC./AUTHOR</span>
                </th>
                <th class="px-6 py-3 bg-gray-50">
                    <span
                        class="text-lg font-medium tracking-wider leading-4 text-left text-gray-500 uppercase">ACTION</span>
                </th>               
            </tr>
            </thead>

            <tbody class="bg-white divide-y divide-gray-200 divide-solid">
            <template v-for="item in books" :key="item.id">
                <tr class="bg-white">
                    <td class="px-6 py-4 text-sm leading-5 text-left text-gray-900 whitespace-no-wrap">
                        {{ item.title }}
                    </td>
                    <td class="px-6 py-4 text-sm leading-5 text-left text-gray-900 whitespace-no-wrap">
                        {{ item.description }}
                    </td>
                    <td class="px-6 py-4 text-sm leading-5 text-gray-900 whitespace-no-wrap">
                        <router-link :to="{ name: 'books.edit', params: { id: item.id } }"
                                     class="mr-2 inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150">
                            Edit
                        </router-link>
                        <button @click="deleteBook(item.id)"
                                class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150">
                        Delete</button>
                    </td>                   
                </tr>
            </template>
            </tbody>
        </table>
    </div>
</template>

<script>
import useBooks from '../../composables/books'
import { onMounted } from 'vue';

export default {
    setup() {
        const { books, getBooks, destroyBook } = useBooks()

        onMounted(getBooks)

        const deleteBook = async (id) => {
            if (!window.confirm('WHOAAA!! WHY SO SERIOUS?!')) {
                return
            }
            await destroyBook(id);
            await getBooks();
        }

        return {
            books,
            deleteBook
        }
    }
}
</script>