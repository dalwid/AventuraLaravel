<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Crias Post') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">            
           
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-5">
                <form action="{{ route('admin.posts.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="w-full.mb-6">
                        <label class="block text-white mb-2">Titulo</label>
                        <input type="text" class="w-full roundeed" name="title"></input>
                        @error('title')
                            <div class="mt-2 w-full rounded border border-red-700 bg-red-200 text-red-900 font-bold p-2">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="w-full.mb-6">
                        <label class="block text-white mb-2">Descrição</label>
                        <input type="text" class="w-full roundeed" name="description"></input>
                    </div>

                    <div class="w-full.mb-6">
                        <label class="block text-white mb-2">Conteúdo</label>
                        <input type="text" class="w-full roundeed" name="body"></input>
                        @error('body')
                            <div class="mt-2 w-full rounded border border-red-700 bg-red-200 text-red-900 font-bold p-2">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="w-full.mb-6">
                        <label class="block text-white mb-2">Estatus</label>
                        <div class="flex justify-start gap-3 text-white">
                            <div><input type="radio" class="" name="is_active" value="1" checked>Ativo</input></div>
                            <div><input type="radio" class="" name="is_active" value="0">Inativo</input></div>
                        </div>
                    </div>

                    <div class="w-full mb-6 bg-white p-2">
                        <label class="block text-black mb-2">Capa Postagem</label>
                        <input type="file" class="w-full rounded" name="thumb">
                        @error('thumb')
                            <div class="mt-2 w-full rounded border border-red-700 bg-red-200 text-red-900 font-bold p-2">{{ $message }}</div>
                        @enderror
                    </div>

                     <div class="w-full mb-6 p-2">
                        <label class="block text-white mb-2">Autor</label>
                        <select name="user" class="w-full rounded">
                            <option value="">Selecione o autor do post</option>
                            @foreach($users as $user)
                                <option value="{{ $user->id }}">{{ $user->name }}</option>
                            @endforeach
                        </select>

                        @error('aothor')
                            <div class="mt-2 w-full rounded border border-red-700 bg-red-200 text-red-900 font-bold p-2">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="w-full flex justify-end">
                        <button class="mt-10 px-4 py-2 shadow rounded text-xl
                                  text-white text-bold bg-green-700 hover:bg-green-900
                                   transition ease-in-out duration-300">
                            Criar Post
                        </button>
                    </div>
                </form>
            </div>
               
        </div>
    </div>

</x-app-layout>