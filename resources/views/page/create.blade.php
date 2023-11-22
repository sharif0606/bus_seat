@extends('layout.app')

@section('pageTitle',trans('Create Category'))
@section('pageSubTitle',trans('Create'))

@section('content')
<style>
    .ck-editor__editable_inline {
        min-height: 400px;
        border:1px solid #AAA !important;
    }
</style>
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
                            <form class="form" method="post" action="{{route(currentUser().'.page.store')}}">
                                @csrf
                                  <div class="row mb-3">
                                    <label for="page_title"><b>{{__('Title')}}<span class="text-danger">*</span></b></label>
                                    <input type="text" id="page_title" value="{{ old('page_title')}}" class="form-control" placeholder="Page title" name="page_title">
                                    @if($errors->has('page_title'))
                                        <span class="text-danger"> {{ $errors->first('page_title') }}</span>
                                    @endif
                                  </div>
                                  <div class="row mb-3">
                                          <label for="details"><b>{{__('Details')}}:</b></label>
                                          <div id="toolbar-container"></div>
                                          <textarea name="details" id="ckeditordetails" class="d-none">{{ old('details')}}</textarea>
                                          <div class="form-control ck-editor__editable ck-editor__editable_inline" id="ckeditor"  rows="5">{{ old('details')}}</div>
                                  </div>
                                  <div class="row mb-3">
                                      <div class="col-6">
                                          <label for="published"><b>{{__('Published')}}<span class="text-danger">*</span></b></label>
                                          <select class="form-control form-select" value="{{ old('published')}}" name="published" required>
                                              <option value="">Select Published</option>
                                              <option value="1">Show</option>
                                              <option value="0">Hide</option>
                                          </select>
                                      </div>
                                      <div class="col-6">
                                          <label for="language"><b>{{__('Language')}}<span class="text-danger">*</span></b></label>
                                          <select class="form-control form-select" value="{{ old('language')}}" name="language" required>
                                              <option value="">Select Published</option>
                                              <option value="en">English</option>
                                              <option value="bn">Bangla</option>
                                          </select>
                                      </div>
                                  </div>
                                    
                                  <div class="col-12 d-flex justify-content-end">
                                      <button type="submit" class="btn btn-primary me-1 mb-1">{{__('Save')}}</button>
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