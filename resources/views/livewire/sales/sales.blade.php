<div>
    <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
        <div class="h-12 px-4 sm:px-0">
            <div class="text-2xl sm:text-3xl font-semibold text-purple-700 dark:text-gray-300">{{ __('Sales Reports') }}</div>       
        </div>
        <div class="w-full mt-4">
            <div class="mt-4 md:grid md:grid-cols-3 md:gap-4">
                <div class="md:col-span-1 md:pr-2">
                    <div class="w-full p-7 bg-white dark:bg-gray-800 overflow-hidden shadow-xl rounded-md sm:rounded-lg">
                        <div class="text-sm text-gray-700 dark:text-gray-400">
                            {{ __('Total Sales:') }}
                        </div>
                        <div class="ml-2 pt-3 text-5xl text-purple-700 dark:text-gray-200">
                            @if (!empty($total_sales))
                                {{ $total_sales }}
                            @else
                                {{ __('0') }}
                            @endif
                        </div>
                    </div>
                </div>
                <div class="md:col-span-2 md:pl-2">
                    <div class="w-full p-6 bg-white dark:bg-gray-800 overflow-hidden shadow-xl rounded-md sm:rounded-lg">
                        <div class="md:grid md:grid-cols-3 md:gap-4">
                            <div class="md:col-span-1 md:pr-2">
                                @if ($total_sales_this_week)
                                    <div x-data="chart()" x-init="initChart()" class="h-20" x-cloak>
                                        <canvas id="totalSalesChart"></canvas>
                                    </div>
                                @else
                                <div class="w-full flex justify-center sm:pt-6">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-16 h-16 text-gray-400 " aria-hidden="true" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                                        <path d="M11 3.05493C6.50005 3.55238 3 7.36745 3 12C3 16.9706 7.02944 21 12 21C16.6326 21 20.4476 17.5 20.9451 13H11V3.05493Z" />
                                        <path d="M20.4878 9H15V3.5123C17.5572 4.41613 19.5839 6.44285 20.4878 9Z"/>
                                    </svg>
                                </div>
                                @endif
                            </div>
                            <div class="md:col-span-2 md:pl-2">
                                <div class="text-md text-gray-700 dark:text-gray-300">
                                    {{ __('Total Sales This Week') }}
                                </div>
                                <div class="flex">
                                    <div class="w-1/2">
                                        <div class="text-sm text-gray-600 dark:text-gray-400">
                                            {{ __('Today:') }}
                                        </div>
                                        <div class="ml-2 pt-3 text-2xl text-blue-600 dark:text-blue-600">
                                            {{ $total_sales_today }}
                                        </div>
                                    </div>
                                    <div class="w-1/2">
                                        <div class="text-sm text-gray-600 dark:text-gray-400">
                                            {{ __('Whole Week:') }}
                                        </div>
                                        <div class="ml-2 pt-3 text-2xl text-purple-600 dark:text-purple-600">
                                            {{ $total_sales_this_week }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="mt-4 text-lg sm:text-xl font-semibold text-purple-700 dark:text-gray-300">
            {{ __('Sales ') }}
        </div>
        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8 mt-1">
            <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                <div class="shadow overflow-hidden border-b border-gray-100 dark:border-gray-800 sm:rounded-lg">
                    <div class="flex justify-between min-w-full px-6 py-4 bg-white dark:bg-gray-800">
                        <div class="relative z-0 flex items-center w-full max-w-xl focus-within:text-purple-700">
                            <div class="absolute inset-y-0 flex items-center pl-2">
                                <svg class="w-4 h-4 text-gray-600 dark:text-gray-300" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd"></path>
                                </svg>
                            </div>
                            <input wire:model.debounce.350ms="search" class="w-full pl-8 text-sm text-gray-600 dark:text-gray-200 font-semibold placeholder-gray-500 bg-gray-200 border-0 border-gray-200 dark:bg-gray-900 rounded-full focus:placeholder-gray-500 focus:bg-gray-100 focus:border-purple-700 focus:outline-none form-input" type="text" placeholder="Search Sale Id..." aria-label="Search" />
                            <div class="absolute inset-y-0 right-0 pr-2 flex items-center">
                                <div  wire:loading wire:target="search">
                                    <x-spinner></x-spinner>
                                </div>
                            </div>
                        </div>
                        <div class="relative z-10">
                            <x-date-picker wire:model="dateFilter"></x-date-picker>
                        </div>
                    </div>
                    @if ($sales->isNotEmpty())
                        <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                            <thead class="bg-gray-200 dark:bg-gray-700">
                                <tr>
                                    <th scope="col" class="px-6 py-3 text-left text-sm font-semibold text-gray-600 dark:text-gray-300 tracking-wider">
                                        Id
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-left text-sm font-semibold text-gray-600 dark:text-gray-300 tracking-wider">
                                        Served By
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-left text-sm font-semibold text-gray-600 dark:text-gray-300 tracking-wider">
                                        Date
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-left text-sm font-semibold text-gray-600 dark:text-gray-300 tracking-wider">
                                        Products
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-left text-sm font-semibold text-gray-600 dark:text-gray-300 tracking-wider">
                                        Payment Type
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-center text-sm font-semibold text-gray-600 dark:text-gray-300 tracking-wider">
                                        Actions
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="bg-white dark:bg-gray-800 divide-y divide-gray-200 dark:divide-gray-700">
                                @foreach ($sales as $sale)
                                    <tr>
                                        <td class="px-6 py-1 whitespace-nowrap text-sm text-gray-800 dark:text-gray-300">
                                            {{ $sale->id }}
                                        </td>
                                        <td class="px-6 py-1 whitespace-nowrap text-sm text-gray-800 dark:text-gray-300">
                                            {{ $sale->user->name }}
                                        </td>
                                        <td class="px-6 py-1 whitespace-nowrap text-sm text-gray-800 dark:text-gray-300">
                                            {{ $sale->created_at }}
                                        </td>
                                        <td class="px-6 py-1 whitespace-nowrap text-sm text-gray-800 dark:text-gray-300 truncate">
                                            <div class="-space-x-4">
                                                @foreach ($sale->items as $item)
                                                     <img src="{{ asset('storage/products/'.$item->image) }}" alt="" class="relative z-10 inline object-cover w-10 h-10 border-2 border-white dark:border-gray-800 rounded-full">
                                                @endforeach
                                                <div class="px-1 text-md text-purple-600 dark:text-gray-300 bg-white dark:bg-gray-800 relative z-10 inline object-cover w-12 h-12 border-white dark:border-gray-800 rounded-full">{{ $sale->items_count." products" }}</div>
                                            </div>
                                        </td>
                                        <td class="px-6 py-1 whitespace-nowrap text-sm text-gray-800 dark:text-gray-300">
                                            {{ $sale->payment_type }}
                                        </td>
                                        <td class="px-6 py-1 whitespace-nowrap flex justify-center">
                                            <div wire:click="showSaleDetail({{ $sale->id }})"  class="cursor-pointer inline-block py-2 transform hover:-translate-y-1 hover:scale-110 transition duration-500 ease-in-out">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-blue-600  hover:text-blue-700" aria-hidden="true" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.9998 12C14.9998 13.6569 13.6566 15 11.9998 15C10.3429 15 8.99976 13.6569 8.99976 12C8.99976 10.3431 10.3429 9 11.9998 9C13.6566 9 14.9998 10.3431 14.9998 12Z" />
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.45801 12C3.73228 7.94288 7.52257 5 12.0002 5C16.4778 5 20.2681 7.94291 21.5424 12C20.2681 16.0571 16.4778 19 12.0002 19C7.52256 19 3.73226 16.0571 2.45801 12Z" />
                                                </svg>
                                            </div>
                                            @can('update', $sale)
                                                <div wire:click="saleEditForm({{ $sale->id }})" class="cursor-pointer inline-block py-2 transform hover:-translate-y-1 hover:scale-110 transition duration-500 ease-in-out">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="ml-3 w-5 h-5 text-purple-600  hover:text-purple-700" aria-hidden="true" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                                    </svg>
                                                </div>
                                            @endcan
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
    
                        <div class="min-w-full py-1 px-6 border-t border-gray-300 dark:border-gray-700 bg-white dark:bg-gray-800">
                            <div>
                                {{ $sales->links('components.custom-pagination-links-view') }}
                            </div>
                        </div>
                    @else
                        <div class="text-gray-400 dark:text-gray-600 bg-white dark:bg-gray-800 text-md text-center align-middle overflow-y-auto py-4">
                            <div class="flex justify-center">
                                <svg class="w-16 h-16" aria-hidden="true" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="1" viewBox="0 0 24 24" stroke="currentColor">
                                    <path d="M9 17V15M12 17V13M15 17V11M17 21H7C5.89543 21 5 20.1046 5 19V5C5 3.89543 5.89543 3 7 3H12.5858C12.851 3 13.1054 3.10536 13.2929 3.29289L18.7071 8.70711C18.8946 8.89464 19 9.149 19 9.41421V19C19 20.1046 18.1046 21 17 21Z" />
                                </svg>
                            </div>
                        <div class="text-3xl">No Sales Found</div>
                    </div>
                    @endif
                    
                </div>
            </div>
        </div>
    </div>

    <x-jet-dialog-modal wire:model="showingSaleDetail" maxWidth="2xl">
        <x-slot name="title">
            {{ __('Sale Info') }}
        </x-slot>
        <x-slot name="content">
            @if (!empty($selectedSale))
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <div class="text-md text-gray-600 dark:text-gray-400 font-medium">{{ __('Sale Id:') }}</div>
                        <div class="ml-2 text-md text-gray-700 dark:text-gray-300 font-semibold truncate">{{ $selectedSale->id }}</div>
                    </div>
                    <div>
                        <div class="text-md text-gray-600 dark:text-gray-400 font-medium">{{ __('Date:') }}</div>
                        <div class="ml-2 text-md text-gray-700 dark:text-gray-300 font-semibold truncate">{{ $selectedSale->created_at }}</div>
                    </div>
                    <div>
                        <div class="text-md text-gray-600 dark:text-gray-400 font-medium">{{ __('Served By:') }}</div>
                        <div class="flex ml-2 mt-1">
                            <div class="flex-shrink-0 h-10 w-10">
                                @if ($selectedSale->user->profile_photo_path)
                                    <img class="h-10 w-10 rounded-full" src="{{ url('storage/'.$selectedSale->user->profile_photo_path) }}" alt="">
                                @else
                                    <x-no-image name-string="{{ $selectedSale->user->name }}" :height="10" :width="10" />
                                @endif
                            </div>
                            <div class="ml-4">
                                <div class="flex text-sm font-semibold text-gray-800 dark:text-gray-300">
                                    {{ $selectedSale->user->name }}
                                </div>
                                <div class="text-sm text-gray-700 dark:text-gray-400">
                                    {{ $selectedSale->user->email }}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div>
                        <div class="text-md text-gray-600 dark:text-gray-400 font-medium">{{ __('Payment Type:') }}</div>
                        <div class="ml-2 text-md text-gray-700 dark:text-gray-300 font-semibold truncate">{{ $selectedSale->payment_type }}</div>
                    </div>
                </div>
                <div class="mt-4 text-lg text-purple-600 dark:text-gray-100 font-medium">{{ __('Items') }}</div>
                <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8 mt-1">
                    <div class="align-middle inline-block min-w-full sm:px-6 lg:px-8">
                        <div class="overflow-hidden border border-gray-100 dark:border-gray-700 bg-white dark:bg-gray-800 rounded-lg shadow-md">
                            @foreach ($selectedSale->items as $item)
                                <div class="my-2 px-2 min-w-full">
                                    <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
                                        <div class="flex px-3 whitespace-nowrap">
                                            <div class="flex-shrink-0 h-10 w-10">
                                                @if ($item->image)
                                                <img class="h-10 w-10 rounded-lg" src="{{ asset('storage/products/'.$item->image) }}" alt="">
                                                @else
                                                    <x-no-image name-string="{{ $item->name }}" :height="10" :width="10" />
                                                @endif
                                            </div>
                                            <div class="ml-4">
                                                <div class="flex text-sm font-semibold text-gray-800 dark:text-gray-300">
                                                    {{ $item->name }}
                                                </div>
                                                <div class="text-sm text-gray-700 dark:text-gray-400">
                                                    {{ "Ksh." .$item->selling_price }}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="px-3 whitespace-nowrap">
                                            <div class="text-md text-gray-600 dark:text-gray-400 font-medium">{{ __('No. of Items:') }}</div>
                                            <div class="ml-2 text-md text-gray-700 dark:text-gray-300 font-semibold truncate">{{ $item->pivot->quantity }}</div>
                                        </div>
                                        <div class="px-3 whitespace-nowrap">
                                            <div class="text-md text-gray-600 dark:text-gray-400 font-medium">{{ __('Total:') }}</div>
                                            <div class="ml-2 text-md text-gray-700 dark:text-gray-300 font-semibold truncate">{{ "Ksh." .$item->pivot->total_selling }}</div>
                                        </div>
                                        @can('viewAny', App\Models\Sale::class)
                                            <div class="px-3 whitespace-nowrap">
                                                <div class="text-md text-gray-600 dark:text-gray-400 font-medium">{{ __('Profit:') }}</div>
                                                <div class="flex text-green-500 dark:text-green-500 font-semibold">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-green-500 " aria-hidden="true" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                                                        <path d="M5 10L12 3M12 3L19 10M12 3V21" />
                                                    </svg>
                                                    <div class="ml-1 text-md truncate">{{ floor((($item->pivot->total_selling - ($item->pivot->quantity * $item->cost_price)) / $item->pivot->total_selling) * 100) ."%" }}</div>
                                                </div>
                                            </div>
                                        @endcan
                                    </div>
                                    <div class="border-b border-gray-200 dark:border-gray-700"></div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            @endif
        </x-slot>
        <x-slot name="footer">
            <div></div>
            <x-jet-secondary-button wire:click="$toggle('showingSaleDetail')" wire:loading.attr="disabled">
                <span>{{ __('Close') }}</span>
            </x-jet-secondary-button>
        </x-slot>
    </x-jet-dialog-modal>

    <x-jet-dialog-modal wire:model="showingEditForm" maxWidth="md">
        <x-slot name="title">
            {{ __('Sale ' .$saleId. ' Edit') }}
        </x-slot>
        <x-slot name="content">
            <div class="relative z-20">
                <x-jet-label for="server" value="{{ __('Served By:') }}" />
                <x-select>
                    <x-slot name="title">
                        {{ $selectedUserName }}
                    </x-slot>
                    <x-slot name="options">
                        @foreach ($users as $user)
                            <li wire:click="selectingUser({{ $user->id }}, '{{$user->name}}')" id="listbox-item-0" role="option" class="text-gray-900 dark:text-gray-100 hover:bg-gray-100 dark:hover:bg-gray-800 cursor-pointer select-none relative py-2 pl-3 pr-9">
                                <div class="flex items-center">
                                    <!-- Selected: "font-semibold", Not Selected: "font-normal" -->
                                    <span class="{{ $selectedUserId == $user->id ? 'block font-semibold truncate' : 'block font-normal truncate' }}">
                                        {{ $user->name }}
                                    </span>
                                </div>
                        
                                @if ($selectedUserId == $user->id)
                                    <span class="absolute inset-y-0 right-0 flex items-center pr-4">
                                        <!-- Heroicon name: solid/check -->
                                        <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                            <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                                        </svg>
                                    </span>
                                @endif
                            </li>
                        @endforeach
                    </x-slot>
                </x-select>
                <x-jet-input-error for="server" class="mt-2" />
            </div>
            <div class="mt-2 relative z-10">
                <x-jet-label for="payment_type" value="{{ __('Payment Type:') }}" />
                <x-select>
                    <x-slot name="title">
                        {{ $payment_type }}
                    </x-slot>
                    <x-slot name="options">
                        <li wire:click="$set('payment_type', 'Cash')" id="listbox-item-0" role="option" class="text-gray-900 dark:text-gray-100 hover:bg-gray-100 dark:hover:bg-gray-800 cursor-pointer select-none relative py-2 pl-3 pr-9">
                            <div class="flex items-center">
                                <!-- Selected: "font-semibold", Not Selected: "font-normal" -->
                                <span class="{{ $payment_type == 'Cash' ? 'block font-semibold truncate' : 'block font-normal truncate' }}">
                                    {{ __('Cash') }}
                                </span>
                            </div>
                            @if ($payment_type == 'Cash')
                                <span class="absolute inset-y-0 right-0 flex items-center pr-4">
                                    <!-- Heroicon name: solid/check -->
                                    <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                        <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                                    </svg>
                                </span>
                            @endif
                        </li>
                        <li wire:click="$set('payment_type', 'Mobile Money')" id="listbox-item-0" role="option" class="text-gray-900 dark:text-gray-100 hover:bg-gray-100 dark:hover:bg-gray-800 cursor-pointer select-none relative py-2 pl-3 pr-9">
                            <div class="flex items-center">
                                <!-- Selected: "font-semibold", Not Selected: "font-normal" -->
                                <span class="{{ $payment_type == 'Mobile Money' ? 'block font-semibold truncate' : 'block font-normal truncate' }}">
                                    {{ __('Mobile Money') }}
                                </span>
                            </div>
                            @if ($payment_type == 'Mobile Money')
                                <span class="absolute inset-y-0 right-0 flex items-center pr-4">
                                    <!-- Heroicon name: solid/check -->
                                    <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                        <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                                    </svg>
                                </span>
                            @endif
                        </li>
                    </x-slot>
                </x-select>
            </div>
        </x-slot>
        <x-slot name="footer">
            <x-jet-secondary-button wire:click="cancelSaleForm" wire:loading.attr="disabled">
                <span wire:loading.remove wire:target="cancelSaleForm">{{ __('Cancel') }}</span>
                <span wire:loading wire:target="cancelSaleForm">{{ __('Cancelling...') }}</span>
            </x-jet-secondary-button>
            <x-jet-button wire:click="editSale" wire:loading.attr="disabled">
                <span wire:loading.remove wire:target="editSale">{{ __('Update') }}</span>
                <span wire:loading wire:target="editSale">
                    {{ __('Updating...') }}
                </span>
            </x-jet-button>
        </x-slot>
    </x-jet-dialog-modal>

    <script>
        /*document.addEventListener('livewire:load', function() {
            let totalSalesChart = document.getElementById('totalSalesChart').getContext('2d');
            
            let doughnutChart = new Chart(totalSalesChart, {
                type: 'doughnut',
                data: {
                    //labels: ['Today','This Week'],
                    datasets:[{
                        label: 'Sales',
                        data: [
                            {!! $total_sales_today !!},
                            {!! $total_sales_this_week !!}
                        ],
                        backgroundColor: [
                            '#1a56db',
                            '#0e9f6e'
                        ],
                        //borderWidth:1,
                        borderColor:'transparent',
                        //hoverBorderWidth:4,
                    }]
                },
                options: {
                    responsive:true,
                    maintainAspectRatio:false
                }
            });
    
        })*/
        function chart() {
            return {
                initChart() {
                    let totalSalesChart = document.getElementById('totalSalesChart').getContext('2d');
                
                    let doughnutChart = new Chart(totalSalesChart, {
                        type: 'doughnut',
                        data: {
                            //labels: ['Today','This Week'],
                            datasets:[{
                                label: 'Sales',
                                data: [
                                    {{ $total_sales_today }},
                                    {{ $total_sales_this_week }}
                                ],
                                backgroundColor: [
                                    '#1a56db',
                                    '#7e3af2'
                                ],
                                //borderWidth:1,
                                borderColor:'transparent',
                                //hoverBorderWidth:4,
                            }]
                        },
                        options: {
                            responsive:true,
                            maintainAspectRatio:false
                        }
                    });
                }
            }
        }
    </script>
</div>

