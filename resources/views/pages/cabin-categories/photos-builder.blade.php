@props([
    'data'
])

<div x-data="handler()"
     x-init="loadForm({{ json_encode($data) }})"
     class="w-full">
    <input type="hidden" name="photos"
           aria-label="JSON data"
           x-model="JSON.stringify(items)"/>

    <template x-for="(item, index) in items" :key="index">
        <!-- Item Row -->
        <div
            class="mt-2 w-full flex gap-2 border-b hover:border-b-blue-300/75 dark:border-b-gray-700/75 dark:hover:border-b-blue-900/75 pb-2">
            <div class="w-10/12">
                <input type="url" class="input-field py-1" aria-label="{{ __('Photo') }}"
                       x-model="item.url" placeholder="{{ __('Set Photo URL') }}">
            </div>
            <div class="w-2/12 items-center justify-end flex">
                <button type="button"
                        class="secondary-button px-1 md:px-5 py-1 m-0"
                        title="{{ __('Delete') }}"
                        @click="deleteItem(index)">
                    <x-svg svg="x" class="w-5 h-5 text-red-600 md:mr-1 md:-ml-1" stroke="2"/>
                    <span class="hidden md:inline-block">{{ __('Delete') }}</span>
                </button>
            </div>
        </div>
    </template>
    <div class="py-2">
        <button type="button" class="secondary-button w-full sm:w-auto"
                @click="addItem()">
            <x-svg svg="plus" class="mr-1 text-green-600"/>
            {{ __('Create') }} {{ __('Photo') }}
        </button>
    </div>
</div>

<script>
    function handler() {
        return {
            items: [],

            addItem() {
                this.items.push({url: ""});
            },
            deleteItem(index) {
                this.deleteArrayItem(this.items, index);
            },
            deleteArrayItem(array, index) {
                array.splice(index, 1);
            },
            loadForm(data) {
                this.items = data;
            },
        };
    }
</script>
