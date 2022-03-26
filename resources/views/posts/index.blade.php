<x-app-layout>
  @section('title', 'Posts')

  <x-slot:header>
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      {{ __('Posts') }}
    </h2>
    </x-slot>

    <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
          <div class="p-6 bg-white border-b border-gray-200">
            <div class="table-responsive">
              <table class="table table-stripped" style="width: 100%;">
                <thead>
                  <tr>
                    <th>ID</th>
                    <th>Título</th>
                    <th>Contenido</th>
                    <th>Categoría</th>
                  </tr>
                </thead>
                <tbody>
                  @if(count($posts))
                    @foreach($posts as $post)
                      <tr>
                        <td>{{$post->id}}</td>
                        <td style="width:35%">{{$post->title}}</td>
                        <td>{{$post->content}}</td>
                        <td>{{$post->category->name}}</td>
                      </tr>
                    @endforeach
                  @else
                    <tr>
                      <td colspan="6">No hay registros creados</td>
                    </tr>
                  @endif
                </tbody>
              </table>

              @if(count($posts))
                <div class="row">
                  <div class="col-md-12">
                    {{ $posts->links('pagination::tailwind') }}
                  </div>
                </div>
              @endif
              {{-- php artisan vendor:publish --tag=laravel-pagination --}}
            </div>
          </div>
        </div>
      </div>
    </div>
</x-app-layout>