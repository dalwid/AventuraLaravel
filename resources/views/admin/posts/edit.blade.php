<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Editar Post') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            {{-- @error('title') {{ $message }} @error --}}

            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-5">
                <form action="{{ route('admin.posts.update', $post->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="w-full.mb-6">
                        <label class="block text-white mb-2">Titulo</label>
                        <input type="text" class="w-full roundeed" name="title" value="{{ $post->title }}"></input>
                    </div>

                    <div class="w-full.mb-6">
                        <label class="block text-white mb-2">Descrição</label>
                        <input type="text" class="w-full roundeed" name="description" value="{{ $post->description }}"></input>
                    </div>

                    <div class="w-full.mb-6">
                        <label class="block text-white mb-2">Conteúdo</label>
                        <input type="text" class="w-full roundeed" name="body" value="{{ $post->body }}"></input>
                    </div>

                    <div class="w-full.mb-6">
                        <label class="block text-white mb-2">Estatus</label>
                        <div class="flex justify-start gap-3 text-white">
                            <div><input type="radio" class="" name="is_active" value="1" @if($post->is_active)  checked @endif>Ativo</input></div>
                            <div><input type="radio" class="" name="is_active" value="0" @if(!$post->is_active) checked @endif>Inativo</input></div>
                        </div>
                    </div>

                    <div class="w-full mb-6 bg-white p-2 flex">
                        <div class="w-1/2 flex items-center justify-center">
                            
                            @if($post->thumb)
                                <img src="{{ asset('storage/' . $post->thumb) }}" alt="Capa da Postagem: {{ $post->title }}">
                            @endif


                        </div>
                        <div class="w-1/2">
                            <label class="block text-black mb-2">Capa Postagem</label>
                            <input type="file" class="w-full rounded" name="thumb">
                        </div>
                    </div>

                    <div class="w-full flex justify-end">
                        <button class="mt-10 px-4 py-2 shadow rounded text-xl
                                  text-white text-bold bg-green-700 hover:bg-green-900
                                   transition ease-in-out duration-300">
                            Editar Post
                        </button>
                    </div>
                </form>
            </div>
               
        </div>
    </div>

</x-app-layout>