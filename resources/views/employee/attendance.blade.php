@extends('layout.app')

@section('content')
    <div class="px-24 py-10 bg-gray-800">
        <div class="relative overflow-x-auto">
            <div class="flex justify-between items-center px-24">
                <h1 class="pb-8 text-gray-200 font-semibold text-xl">
                    {{ $employeeInfo->employee->name }}
                </h1>
                
                    <a href="">
                        <div class="flex">
                        <svg class="w-6 h-6 text-gray-800 dark:text-white hover:text-gray-300" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                            <path fill-rule="evenodd" d="M7 2a2 2 0 0 0-2 2v1a1 1 0 0 0 0 2v1a1 1 0 0 0 0 2v1a1 1 0 1 0 0 2v1a1 1 0 1 0 0 2v1a1 1 0 1 0 0 2v1a2 2 0 0 0 2 2h11a2 2 0 0 0 2-2V4a2 2 0 0 0-2-2H7Zm3 8a3 3 0 1 1 6 0 3 3 0 0 1-6 0Zm-1 7a3 3 0 0 1 3-3h2a3 3 0 0 1 3 3 1 1 0 0 1-1 1h-6a1 1 0 0 1-1-1Z" clip-rule="evenodd"/>
                        </svg>                    
                        <span class="text-gray-400 text-sm hover:underline"> | Agregar asistencia</span>                        
                    </div>
                    </a>
                    
                
                
            </div>
            
            
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            Fecha
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Legada
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Salida
                        </th>
                    </tr>
                </thead>
                <tbody>                    
                    @foreach ( array_reverse($employeeInfo->employee->attendance) as $attendance)
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                            <th scope="row"
                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{ $attendance->date }}
                            </th>
                            <td class="px-6 py-4">
                                {{ $attendance->check_in }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $attendance->check_out }}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
