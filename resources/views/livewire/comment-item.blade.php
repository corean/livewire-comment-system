<div class="my-6">
    <div class="flex item-center space-x-2">
        <img src="" alt=""
             class="size-8 rounded-full bg-black">
        <div class="font-semibold">{{ $comment->user->name }}</div>
        <div class="text-sm">{{ $comment->created_at->diffForHumans() }}</div>
    </div>
    <div class="mt-4">
        {{ $comment->body }}
    </div>
</div>
