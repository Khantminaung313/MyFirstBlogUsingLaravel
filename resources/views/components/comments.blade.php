@props(['comments', 'blog'])

<x-card-wrapper>
<h4 class="text-muted mb-5">Comments({{ $comments->count() }})</h4>
    @foreach ($comments as $comment)
        <x-single-comment :blog="$blog" :comment="$comment" :user="$comment->author" />
    @endforeach
</x-card-wrapper>

<div class="d-flex justify-content-center mt-4">
    {{$comments->links()}}
</div>
