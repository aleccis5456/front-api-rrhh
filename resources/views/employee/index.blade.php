@extends('layout.app')

@section('content')
    <div class="px-24 py-10 bg-gray-800">
        <div class="relative overflow-x-auto">
            <h1 class="pb-8 text-gray-200 font-semibold text-xl text-center">Lista de empleados</h1>
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            Nombre
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Email
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Departamento
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Ultima asistencia
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Acciones
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($employees as $employee)
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                            <th scope="row"
                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{ $employee->name }}
                            </th>
                            <td class="px-6 py-4">
                                {{ $employee->email }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $employee->department->name }}
                            </td>
                            <td class="px-6 py-4">
                                @php
                                    $lastAttendance = end($employee->attendance);
                                @endphp

                                @if ($lastAttendance)
                                    <div>
                                        <b>Fecha: </b> {{ $lastAttendance->date }} <br>
                                        <b>llegada: </b>{{ $lastAttendance->check_in }} <br>
                                        <b>Salida: </b>{{ $lastAttendance->check_out }} <br>
                                        <a href="{{ route('employee.show', ['id' => $employee->id]) }}" class="text-blue-500 hover:underline hover:text-blue-500 hover:font-semibold">
                                            VER TODAS</a>
                                    </div>
                                @endif                                
                            </td>
                            <td class="px-6 py-4 flex">
                                <a href="" class="p-4">
                                    <svg class="w-6 h-6 text-gray-800 dark:text-white hover:text-yellow-300" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                                        <path fill-rule="evenodd" d="M5 8a4 4 0 1 1 7.796 1.263l-2.533 2.534A4 4 0 0 1 5 8Zm4.06 5H7a4 4 0 0 0-4 4v1a2 2 0 0 0 2 2h2.172a2.999 2.999 0 0 1-.114-1.588l.674-3.372a3 3 0 0 1 .82-1.533L9.06 13Zm9.032-5a2.907 2.907 0 0 0-2.056.852L9.967 14.92a1 1 0 0 0-.273.51l-.675 3.373a1 1 0 0 0 1.177 1.177l3.372-.675a1 1 0 0 0 .511-.273l6.07-6.07a2.91 2.91 0 0 0-.944-4.742A2.907 2.907 0 0 0 18.092 8Z" clip-rule="evenodd"/>
                                      </svg>                                                                            
                                </a>                                
                                <a href="" class="p-4">
                                    <svg class="w-6 h-6 text-gray-800 dark:text-white hover:text-red-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                                        <path fill-rule="evenodd" d="M5 8a4 4 0 1 1 8 0 4 4 0 0 1-8 0Zm-2 9a4 4 0 0 1 4-4h4a4 4 0 0 1 4 4v1a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-1Zm13-6a1 1 0 1 0 0 2h4a1 1 0 1 0 0-2h-4Z" clip-rule="evenodd"/>
                                      </svg>
                                      
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
