<div class="text-sm">
    @forelse($comments as $comment)
        <div class="flex gap-x-4 py-2">
            <div class="w-20">
                {{ $comment->user?->name }}
            </div>
            <div>
                {{ $comment->body }}

                <div class="text-slate-400">
                    {{ $comment->created_at->diffForHumans() }}
                </div>
            </div>
        </div>
    @empty
        <p>No comments yet</p>
    @endforelse
</div>
