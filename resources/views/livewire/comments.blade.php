<div>

    <h2>Comments ({{ $comments->count() }})</h2>

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

    @auth
        <form class="mt-4">
            <div>
                <x-textarea wire:model="form.body"
                            class="w-full"
                            placeholder="Post a comment"
                            rows="4"
                />
                <x-input-error :messages="$errors->get('form.body')"/>
                <x-primary-button
                        wire:click.prevent="addComment"
                        class="mt-2">Post a comment</x-primary-button>

            </div>
        </form>
    @endauth


</div>
