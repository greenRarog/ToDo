<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <table>
                        <tr>
                            <td>добавить:</td>
                            <td><input name='name' value='название'></td>
                            <td><input name='date' value='дата'></td>
                            <td><button class='send'>добавить</button></td>
                        </tr>
                    </table>                    

                    <h3><a href="{{ url('todo') . '/' . $beforeDate }}"><<</a> {{ $date }}  <a href="{{ url('todo') . '/' . $nextDate }}">>></a></h3>
                    <ul>
                        @foreach($todoList as $todo) 
                            <li>{{ $todo->content }} <=> {{ $todo->date_complite }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
