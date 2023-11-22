@extends('layout.app')

@section('pageTitle',trans('Edit Page'))
@section('pageSubTitle',trans('Update'))

@section('content')
  <!-- // Basic multiple Column Form section start -->
    <section id="multiple-column-form">
        <div class="row match-height">
            <div class="col-12">
                <div class="card">
                    @if(Session::has('response'))
                        {!!Session::get('response')['message']!!}
                    @endif
                    <div class="card-content">
                        <div class="card-body">
                            <form class="form" method="post" enctype="multipart/form-data" action="{{route(currentUser().'.page.update',encryptor('encrypt',$page->id))}}">
                                @csrf
                                @method('PATCH')
                                <input type="hidden" name="uptoken" value="{{encryptor('encrypt',$page->id)}}">
                                <div class="row mb-3">
                                    <label for="page_title"><b>{{__('Title')}}<span class="text-danger">*</span></b></label>
                                    <input type="text" id="page_title" value="{{ old('page_title',$page->page_title)}}" class="form-control" placeholder="Page title" name="page_title">
                                    @if($errors->has('page_title'))
                                        <span class="text-danger"> {{ $errors->first('page_title') }}</span>
                                    @endif
                                  </div>
                                  <div class="row mb-3">
                                          <label for="details"><b>{{__('Details')}}:</b></label>
                                          <div id="toolbar-container"></div>
                                          <textarea name="details" id="ckeditordetails" class="d-none">{{ old('details',$page->details)}}</textarea>
                                          <div class="form-control ck-editor__editable ck-editor__editable_inline" id="ckeditor"  rows="5">{!! old('details',$page->details)!!}</div>
                                  </div>
                                  <div class="row mb-3">
                                      <div class="col-6">
                                          <label for="published"><b>{{__('Published')}}<span class="text-danger">*</span></b></label>
                                          <select class="form-control form-select" name="published" required>
                                              <option value="">Select Published</option>
                                              <option value="1" {{ $page->published=='1'?'selected':''}}>Show</option>
                                              <option value="0" {{ $page->published=='0'?'selected':''}}>Hide</option>
                                          </select>
                                      </div>
                                      <div class="col-6">
                                          <label for="language"><b>{{__('Language')}}<span class="text-danger">*</span></b></label>
                                          <select class="form-control form-select" name="language" required>
                                              <option value="">Select Language</option>
                                              <option value="en" {{ $page->language=='en'?'selected':''}}>English</option>
                                              <option value="bn" {{ $page->language=='bn'?'selected':''}}>Bangla</option>
                                          </select>
                                      </div>
                                  </div>
                                <div class="row">
                                    <div class="col-12 d-flex justify-content-end">
                                        <button type="submit" class="btn btn-primary me-1 mb-1">{{__('Save')}}</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@push('scripts')
<script src="{{ asset('assets/ckeditor5-build-decoupled-document/ckeditor.js') }}"></script>
<script>
    $('#ckeditor').blur(function(){
        $('#ckeditordetails').val($(this).html());
    })
    DecoupledEditor.create( document.querySelector( '#ckeditor' ),{
        ckfinder: {
            uploadUrl: '{{route('image.upload').'?_token='.csrf_token()}}',
        }
    })
    .then( editor => {
        const toolbarContainer = document.querySelector( '#toolbar-container' );

        toolbarContainer.appendChild( editor.ui.view.toolbar.element );
    } )
    .catch( error => {
        console.error( error );
    } );
    
</script>

@endpush