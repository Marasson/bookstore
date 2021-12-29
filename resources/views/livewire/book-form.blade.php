<div>
  <h4 class="mb-4 text-2xl font-bold">Please add (or edit) book and description: </h4>
    <div>
        <div class="container mx-auto">
            <form method="POST" wire:submit.prevent="storeBook">
                @csrf
                <div>
                    <label for="title">Title</label>
                    <input type="text" wire:model.lazy="title" class="w-full py-2 rounded">
                    @error('title')
                    <span class="text-red-600">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mt-8">
                    <label class="block mb-2 text-xl">Description </label>
                    <textarea wire:model.lazy="description" rows="3" cols="20" class="w-full rounded">
                </textarea>
                    @error('description')
                    <span class="text-red-600">{{ $message }}</span>
                    @enderror
                </div>
                <button type="submit" class="px-4 py-2 mt-4 text-white bg-blue-600 rounded">
                    ADD NEW BOOK
                </button>
                <button type="submit" wire:click="update" class="px-4 py-2 text-white bg-indigo-600 rounded">
                    UPDATE EXISTING BOOK
                </button>
            </form>
        </div>
        <div class="flex flex-col mt-8">
            <div class="py-2">
                <div
                    class="min-w-full border-b border-gray-200 shadow">
                    <table class="min-w-full">
                        <thead>
                            <tr>
                                <th class="px-6 py-3 text-left text-gray-500 border-b border-gray-200 bg-gray-50">
                                    ID
                                </th>
                                <th class="px-6 py-3 text-left text-gray-500 border-b border-gray-200 bg-gray-50">
                                    TITLE
                                </th>
                                <th class="px-6 py-3 text-left text-gray-500 border-b border-gray-200 bg-gray-50">
                                    DESC./AUTHOR
                                </th>
                                <th class="px-6 py-3 text-left text-gray-500 border-b border-gray-200 bg-gray-50">
                                    EDIT?
                                </th>
                                </th>
                                <th class="px-6 py-3 text-left text-gray-500 border-b border-gray-200 bg-gray-50">
                                    DELETE?
                                </th>
                            </tr>
                        </thead>

                        <tbody class="bg-white">
                            @foreach($books as $book)
                            <tr>
                                <td class="px-6 py-4 border-b border-gray-200">
                                    <div class="flex items-center">
                                        <div class="ml-4">
                                            <div class="text-sm text-gray-900">
                                                {{ $book->id }}
                                            </div>
                                        </div>
                                    </div>
                                </td>

                                <td class="px-6 py-4 border-b border-gray-200">
                                    <div class="text-sm text-gray-900">
                                        {{ $book->title }}
                                    </div>
                                </td>
                                <td class="px-6 py-4 border-b border-gray-200">
                                    <div class="text-sm text-gray-900">
                                        {{ $book->description }}
                                    </div>
                                </td>

                                <td class="px-6 py-4 border-b border-gray-200">
                                    <button wire:click="edit({{ $book->id }})" class="px-4 py-2 text-white bg-blue-600">
                                        EDIT THIS RECORD
                                    </button>
                                </td>

                                <td class="px-6 py-4 text-sm text-gray-500 border-b border-gray-200">
                                    <button wire:click="destroy({{ $book->id }})"
                                        class="px-4 py-2 text-white bg-red-600">
                                        DELETE BOOK FROM DB
                                    </button>
                                </td>

                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                {{ $books->links() }}
            </div>
        </div>
    </div>
</div>