<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tes Ujian') }}
        </h2>
    </x-slot>

    <x-slot name="script">
        <script>
            var datatable = $('#crudTable').DataTable({
                ajax: {
                    url : '{!! url()->current() !!}'
                    // url yang sedang dibuka sekarang
                },
                columns: [
                    {data : 'id', name: 'id', width: '10%'},
                    {data:'writing', name:'writing', width:'40%'},
                    {data:'reading', name:'reading'},
                    {
                        data : 'action',
                        name : 'action',
                        ordertable : false,
                        searchable : false,
                        width : '25%'
                    }
                ],
            })
        </script>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @php
                $cek = App\Models\Assignment::where('registrations_id', $registration->id)->first();
            @endphp
            @if (!$cek)
                <div class="mb-10">
                    <a href="{{route('dashboard.registration.assigntment.create', $registration->id)}}"  class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded shadow-lg">
                        + tambah file tes
                    </a>
                </div>
            @endif

            <div class="shadow overflow-hidden sm-rounded-md">
                <div class="px-4 py-5 bg-white sm:p-6">
                    <table id="crudTable">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Foto</th>
                                <th>Link tes bacaan</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody></tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>

</x-app-layout>
