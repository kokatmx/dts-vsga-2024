<x-layout>
    <x-slot:title>{{ $title }}</x-slot:title>

    <div class="container mx-auto py-8">
        <h2 class="text-3xl font-bold text-center text-gray-800 mb-8">Laravel DataTables</h2>
        <div class="shadow-lg rounded-lg border border-gray-200 p-5">
            <table id="users-table" class="table w-full text-center">
                <thead class="bg-gray-100 text-gray-600 uppercase text-sm">
                    <tr>
                        <th class="py-3 px-4">ID</th>
                        <th class="py-3 px-4">Name</th>
                        <th class="py-3 px-4">Email</th>
                        <th class="py-3 px-4">Created At</th>
                        <th class="py-3 px-4">Updated At</th>
                    </tr>
                </thead>
                <tbody class="bg-white text-gray-800">
                    <!-- DataTable rows will be inserted here -->
                </tbody>
            </table>
        </div>
    </div>

    <style>
        /* Custom styles for table rows */
        #users-table tbody tr {
            border-bottom: 1px solid #e5e7eb;
            /* Tailwind's gray-200 */
        }

        #users-table tbody tr:hover {
            background-color: #f3f4f6;
            /* Tailwind's gray-100 */
        }
    </style>

    <script type="text/javascript">
        $(document).ready(function() {
            $('#users-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{{ route('profil.data') }}',
                columns: [{
                        data: 'id',
                        name: 'id'
                    },
                    {
                        data: 'name',
                        name: 'name'
                    },
                    {
                        data: 'email',
                        name: 'email'
                    },
                    {
                        data: 'created_at',
                        name: 'created_at'
                    },
                    {
                        data: 'updated_at',
                        name: 'updated_at'
                    }
                ],
                language: {
                    search: "🔍 Search:",
                    lengthMenu: "Show _MENU_ entries",
                    info: "Showing _START_ to _END_ of _TOTAL_ entries"
                },
                responsive: true,
            });
        });
    </script>
</x-layout>
