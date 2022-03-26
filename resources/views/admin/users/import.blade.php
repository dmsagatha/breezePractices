<x-app-layout>
  @section('title', 'Areas')

  <x-slot:header>
    <h2 class="font-semibold text-lg text-gray-800 leading-tight">
      Importar Usuarios
    </h2>
    </x-slot>

    <div class="container w-full mx-auto px-2">
      <div class="p-4 mb-10 lg:mt-0 rounded shadow bg-white">
        <div class="py-3 flex justify-end space-x-5">
          @if(session()->has('success'))
            <div class="alert alert-success">
              {{ session()->get('success') }}
            </div>
          @elseif(Session::has("failed"))
            <div class="alert alert-danger">
              {{ session()->get('failed') }}
            </div>
          @endif

          @if(Session::has('success'))
            <div class="p-4 mb-4 text-sm text-blue-700 bg-blue-100 rounded-lg dark:bg-blue-200 dark:text-blue-800" role="alert">
              <span class="font-medium">
                {{ Session::get('success') }}
              </span>
            </div>
          @elseif(Session::has("failed"))
            <div class="p-4 mb-4 text-sm text-blue-700 bg-red-100 rounded-lg dark:bg-red-200 dark:text-blue-800" role="alert">
              <span class="font-medium">
                {{ Session::get('failed') }}
              </span>
            </div>
          @endif

          <form method="post" action="{{ route('parse-csv') }}" enctype="multipart/form-data">
            @csrf
            
            <h1 class="text-2xl font-bold"> Import CSV File Data </h1>

            <div class="relative form-group">
              <x-input type="file" name="csv_file" autofocus />
            </div>
  
            <div class="pt-10 bg-gray-50 text-center space-y-2">
              <x-button type="submit" name="submit" class="w-28">Import Data
              </x-button>
            </div>
          </form>
        </div>
      </div>
    </div>
</x-app-layout>