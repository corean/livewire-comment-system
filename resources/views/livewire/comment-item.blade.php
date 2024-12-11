<div>
    @if (! $deleted)
        <div
                class="my-6"
                x-data="{ replying: false, editing: false }"
                x-on:replied.window="replying = false"
                x-on:edited.window="editing = false"
        >
            <div class="flex item-center space-x-2">
                <img src="{{ $comment->user->avatar() }}"
                     alt="{{ $comment->user->name }}"
                     class="size-8 rounded-full bg-black">
                <div class="font-semibold">{{ $comment->user->name }}</div>
                <div class="text-sm"
                     x-human-date
                     datetime="{{ $comment->created_at->toDateTimeString() }}">
                    {{ $comment->created_at->diffForHumans() }}
                </div>
            </div>

            @can('edit', $comment)
                <template x-if="editing">
                    <form wire:submit="updateComment" class="mt-4">
                        <x-textarea wire:model="editForm.body"
                                    class="w-full"
                                    rows="3"
                        />
                        <x-input-error :messages="$errors->get('editForm.body')"/>
                        <div class="flex items-baseline space-x-2">
                            <x-primary-button class="mt-2"
                            >Post a comment
                            </x-primary-button>
                            <button x-on:click="editing = false"
                                    class="text-sm text-gray-500"
                            >Cancel
                            </button>
                        </div>
                    </form>
                </template>
            @endcan

            <div x-show="! editing" class="mt-4">
                {{ $comment->body }}
            </div>

            <div class="mt-6 text-sm flex items-baseline space-x-3">
                @can('reply', $comment)
                    <button class="text-sm text-gray-500"
                            x-on:click="replying = true;">Reply
                    </button>
                @endcan

                @can('edit', $comment)
                    <button class="text-sm text-gray-500"
                            x-on:click="editing = true;">Edit
                    </button>
                @endcan

                @can('delete', $comment)
                    <button class="text-sm text-gray-500"
                            x-on:click="if (window.confirm('Are you sure?')) { $wire.deleteComment() }">Delete
                    </button>
                @endcan
            </div>

            <template x-if="replying">
                <form wire:submit="replyComment" class="mt-4">
                    <x-textarea wire:model="replyForm.body"
                                class="w-full"
                                placeholder="Reply to {{ $comment->user?->name }}"
                                rows="3"
                    />
                    <x-input-error :messages="$errors->get('replyForm.body')"/>
                    <div class="flex items-baseline space-x-2">
                        <x-primary-button class="mt-2"
                        >Post a comment
                        </x-primary-button>
                        <button x-on:click="replying = false"
                                class="text-sm text-gray-500"
                        >Cancel
                        </button>
                    </div>
                </form>
            </template>

            @if (is_null($comment->parent_id) && $comment->children->count())
                <div class="mt-8 ml-8">
                    @foreach($comment->children as $child)
                        <livewire:comment-item :comment="$child" :key="$child->id"/>
                    @endforeach
                </div>
            @endif

        </div>
    @endif
</div>
