<div
        class="my-6"
        x-data="{ replying: false }"
        x-on:replied.window="replying = false"
>
    <div class="flex item-center space-x-2">
        <img src="" alt=""
             class="size-8 rounded-full bg-black">
        <div class="font-semibold">{{ $comment->user->name }}</div>
        <div class="text-sm">{{ $comment->created_at->diffForHumans() }}</div>
    </div>
    <div class="mt-4">
        {{ $comment->body }}
    </div>

    <div class="mt-4">
        <button class="text-sm text-gray-500"
                x-on:click="replying = true;">Reply
        </button>
    </div>
    <template x-if="replying">
        <form wire:submit="replyComment" class="mt-4">
            <x-textarea wire:model="replyForm.body"
                        class="w-full"
                        placeholder="Post a comment"
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
</div>
