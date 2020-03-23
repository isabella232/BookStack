<div v-pre id="markdown-editor" markdown-editor class="flex-fill flex code-fill">
    @exposeTranslations([
        'errors.image_upload_error',
    ])

    <div class="markdown-editor-wrap active">
        <div class="editor-toolbar">
            <span class="float left editor-toolbar-label">{{ trans('entities.pages_md_editor') }}</span>
            <div class="float right buttons">
                @if(config('services.drawio'))
                    <button class="text-button" type="button" data-action="insertDrawing">@icon('drawing'){{ trans('entities.pages_md_insert_drawing') }}</button>
                    <span class="mx-xs text-muted">|</span>
                @endif
                <button class="text-button" type="button" data-action="insertImage">@icon('image'){{ trans('entities.pages_md_insert_image') }}</button>
                <span class="mx-xs text-muted">|</span>
                <button class="text-button" type="button" data-action="insertLink">@icon('link'){{ trans('entities.pages_md_insert_link') }}</button>
                <span class="mx-xs text-muted">|</span>
                <button class="text-button" type="button" data-action="fullscreen">@icon('fullscreen'){{ trans('common.fullscreen') }}</button>
            </div>
        </div>

        <markdown-toolbar for="markdown-textarea">
            <md-bold><i class="fas fa-bold"></i></md-bold>
            <md-header><i class="fas fa-heading"></i></md-header>
            <md-italic><i class="fas fa-italic"></i></md-italic>
            <md-quote><i class="fas fa-quote-right"></i></md-quote>
            <md-code><i class="fas fa-code"></i></md-code>
            <md-link><i class="fas fa-link"></i></md-link>
            <md-unordered-list><i class="fas fa-list-ul"></i></md-unordered-list>
            <md-ordered-list><i class="fas fa-list-ol"></i></md-ordered-list>
            <md-task-list><i class="fas fa-tasks"></i></md-task-list>
        </markdown-toolbar>

        <div markdown-input class="flex flex-fill">
            <textarea id="markdown-editor-input"
                      @if($errors->has('markdown')) class="text-neg" @endif
                      name="markdown"
                      rows="5">@if(isset($model) || old('markdown')){{ old('markdown') ?? ($model->markdown === '' ? $model->html : $model->markdown) }}@endif</textarea>
        </div>

    </div>

    <div class="markdown-editor-wrap">
        <div class="editor-toolbar">
            <div class="editor-toolbar-label">{{ trans('entities.pages_md_preview') }}</div>
        </div>
        <iframe srcdoc="" class="markdown-display" sandbox="allow-same-origin"></iframe>
    </div>
    <input type="hidden" name="html"/>

</div>



@if($errors->has('markdown'))
    <div class="text-neg text-small">{{ $errors->first('markdown') }}</div>
@endif