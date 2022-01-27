<div class="bg-blue-500 w-full h-screen font-sans p-5">
    @if($addGroupState)
        <form wire:submit.prevent="save">
            <input wire:model.defer="title" type="text" class="appearance-none rounded-none relative block w-full px-3
            py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded focus:outline-none
            focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm @error('title') border-red-500 @enderror">
        </form>
    @else
    <a wire:click="addGroup" class="m-5 cursor-pointer text-gray-200">Добавить</a>
    @endif
    <div wire:sortable="sorting" wire:sortable-group="sorting"
         class="flex px-4 pb-8 items-start mt-3">
        <!-- groups -->
        @foreach($groups as $group)
            <div wire:key="group-{{ $group->id }}" wire:sortable.item="{{ $group->id }}"
                 class="rounded bg-gray-200 flex-no-shrink w-64 p-2 mr-3">
                <div class="flex justify-between py-1">
                    <h3 wire:sortable.handle class="text-sm">{{ $group->title }}</h3>
                    <a wire:click="deleteGroup({{ $group->id }})" class="cursor-pointer inline-flex text-red-800">x</a>
                </div>
                <div class="text-sm mt-2">
                    <ul wire:sortable-group.item-group="{{ $group->id }}">
                    <!-- cards -->
                        @foreach($group->cards as $card)
                            <div wire:key="task-{{ $card->id }}" wire:sortable-group.item="{{ $card->id }}"
                                 class="bg-gray-100 p-2 rounded mt-1 border-b border-gray-400 cursor-pointer hover:bg-gray-200 flex justify-between">
                                {{ $card->title }}

                                <a wire:click="deleteCard({{ $card->id }})" class="cursor-pointer inline-flex text-red-800">x</a>
                            </div>
                        @endforeach
                    </ul>
                    @if($addCardState == $group->id)
                        <form wire:submit.prevent="save">
                            <input wire:model.defer="title" type="text" class="appearance-none rounded-none relative block w-full px-3
                            py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded focus:outline-none
                            focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm @error('title') border-red-500 @enderror">
                        </form>
                    @else
                        <p wire:click="addCard({{ $group->id }})" class="mt-3 text-gray-700 cursor-pointer">Добавить...</p>
                    @endif

                </div>
            </div>
        @endforeach
    </div>

</div>
