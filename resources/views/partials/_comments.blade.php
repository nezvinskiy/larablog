<ul id="commentList" class="list-group">

    <li class="js-comment-template d-none list-group-item mb-1">
        <div class="row justify-content-between">
            <div class="col text-left">
                <strong class="js-comment-author"></strong>
            </div>
            <div class="col text-right">
                <small class="js-comment-date"></small>
            </div>
        </div>
        <div class="row justify-content-between">
            <div class="js-comment-content col"></div>
        </div>
    </li>

    @foreach ($model->comments as $comment)
        <li class="list-group-item mb-1">

            <div class="row justify-content-between">
                <div class="col text-left">
                    <strong>{{ $comment->comment->author }}</strong>
                </div>
                <div class="col text-right">
                    <small>{{ $comment->comment->created_at }}</small>
                </div>
            </div>

            <div class="row justify-content-between">
                <div class="col">
                    {{ $comment->comment->content }}
                </div>
            </div>

        </li>
    @endforeach
</ul>

<div class="card mt-3">
    <div class="card-body">

        <ul id="formCommentErrorList" class="error m-0"></ul>

        <form id="formComment" method="POST" action="{{ $formAction }}">
            @csrf
            <div class="form-group row">
                <div class="col-md-6">
                    <label for="commentAuthor" class="text-right">
                        {{ __('Author') }}
                    </label>

                    <input id="commentAuthor"
                           type="text"
                           class="form-control{{ $errors->has('author') ? ' is-invalid' : '' }}"
                           name="author"
                           value="{{ old('author') }}">

                    @if ($errors->has('author'))
                        <div class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('author') }}</strong>
                        </div>
                    @endif
                </div>
            </div>

            <div class="form-group row">
                <div class="col-md-12">
                    <label for="commentContent" class="text-right">
                        {{ __('Content') }}
                    </label>

                    <textarea id="commentContent"
                              name="content"
                              rows="3"
                              class="form-control{{ $errors->has('content') ? ' is-invalid' : '' }}"
                    >{{ old('content') }}</textarea>

                    @if ($errors->has('author'))
                        <div class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('author') }}</strong>
                        </div>
                    @endif
                </div>
            </div>

            <div class="form-group row mb-0">
                <div class="col-md-6">
                    <button type="submit" class="btn btn-primary btn-sm">
                        {{ __('Submit comment') }}
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
