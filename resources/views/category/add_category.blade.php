@extends('template')
@section('content')
<div class="row">
    <div class="col-6">
        <h6 class="mb-0 text-uppercase">{{ $page_data['page_title'] }}</h6>
    </div>
</div>
<hr />
<div class="card">
    <div class="card-body p-2">
        <h5 class="mb-4">Add Categorys </h5>
        <form class="row g-3" method="POST" action="{{ route('admin.category') }}" enctype="multipart/form-data">
            @csrf
            <div class="col-md-6">
                <label for="input3" class="form-label">Category Name<span class="star">★</span></label>
                <input type="text" id="input3" class="form-control" required name="category" />
            </div>
            <div class="col-md-6">
                <label for="input4" class="form-label">Image<span class="star">★</span></label>
                <input type="file" id="input4" class="form-control" required name="image" />
            </div>

            <div class="col-md-12">
                <div class="mx-4">


                    <div class="d-flex justify-content-between flex-wrap p-1 ">
                        <div class="col-md-6  d-flex gap-2 flex-wrap justify-content-between">
                            <label>Gender :</label>
                            <div class="d-flex gap-2 flex-wrap ">
                                <div class="d-flex gap-2 ">
                                    <label class="form-check-label" for="gender-off">Off</label>
                                    <input class="form-check-input" type="radio" name="gender" value="0"
                                        id="gender-off">
                                </div>
                                <div class="d-flex gap-2">
                                    <label class="form-check-label" for="gender-on">On</label>
                                    <input class="form-check-input" type="radio" name="gender" value="1" id="gender-on">
                                </div>
                                <div class="d-flex gap-2">
                                    <label class="form-check-label" for="gender-Optional">Optional</label>
                                    <input class="form-check-input" type="radio" name="gender" value="2"
                                        id="gender-Optional">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4  d-flex gap-2 flex-wrap justify-content-between">
                            <label>Purity :</label>
                            <div class="d-flex gap-2 flex-wrap ">
                                <div class="d-flex gap-2 ">
                                    <label class="form-check-label" for="purity-off">Off</label>
                                    <input class="form-check-input" type="radio" name="purity" value="0"
                                        id="purity-off">
                                </div>
                                <div class="d-flex gap-2">
                                    <label class="form-check-label" for="purity-on">On</label>
                                    <input class="form-check-input" type="radio" name="purity" value="1" id="purity-on">
                                </div>
                                <div class="d-flex gap-2">
                                    <label class="form-check-label" for="purity-Optional">Optional</label>
                                    <input class="form-check-input" type="radio" name="purity" value="2"
                                        id="purity-Optional">
                                </div>
                            </div>
                        </div>





                    </div>
                    {{-- Second Row --}}
                    <div class="d-flex justify-content-between flex-wrap p-1">
                        <div class="col-md-6  d-flex gap-2 flex-wrap justify-content-between">
                            <label>Color :</label>
                            <div class="d-flex gap-2 flex-wrap ">
                                <div class="d-flex gap-2 ">
                                    <label class="form-check-label" for="Color-off">Off</label>
                                    <input class="form-check-input" type="radio" name="color" value="0" id="Color-off">
                                </div>
                                <div class="d-flex gap-2">
                                    <label class="form-check-label" for="Color-on">On</label>
                                    <input class="form-check-input" type="radio" name="color" value="1" id="Color-on">
                                </div>
                                <div class="d-flex gap-2">
                                    <label class="form-check-label" for="Color-Optional">Optional</label>
                                    <input class="form-check-input" type="radio" name="color" value="2"
                                        id="Color-Optional">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4  d-flex gap-2 flex-wrap justify-content-between">
                            <label>Dandi :</label>
                            <div class="d-flex gap-2 flex-wrap ">
                                <div class="d-flex gap-2 ">
                                    <label class="form-check-label" for="Dandi-off">Off</label>
                                    <input class="form-check-input" type="radio" name="dandi" value="0" id="Dandi-off">
                                </div>
                                <div class="d-flex gap-2">
                                    <label class="form-check-label" for="Dandi-on">On</label>
                                    <input class="form-check-input" type="radio" name="dandi" value="1" id="Dandi-on">
                                </div>
                                <div class="d-flex gap-2">
                                    <label class="form-check-label" for="Dandi-Optional">Optional</label>
                                    <input class="form-check-input" type="radio" name="dandi" value="2"
                                        id="Dandi-Optional">
                                </div>
                            </div>
                        </div>





                    </div>

                    {{-- Third Row --}}
                    <div class="d-flex justify-content-between flex-wrap p-1">
                        <div class="col-md-6  d-flex gap-2 flex-wrap justify-content-between">
                            <label>Kunda :</label>
                            <div class="d-flex gap-2 flex-wrap ">
                                <div class="d-flex gap-2 ">
                                    <label class="form-check-label" for="Kunda-off">Off</label>
                                    <input class="form-check-input" type="radio" name="kunda" value="0" id="Kunda-off">
                                </div>
                                <div class="d-flex gap-2">
                                    <label class="form-check-label" for="Kunda-on">On</label>
                                    <input class="form-check-input" type="radio" name="kunda" value="1" id="Kunda-on">
                                </div>
                                <div class="d-flex gap-2">
                                    <label class="form-check-label" for="Kunda-Optional">Optional</label>
                                    <input class="form-check-input" type="radio" name="kunda" value="2"
                                        id="Kunda-Optional">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4  d-flex gap-2 flex-wrap justify-content-between">
                            <label>Size :</label>
                            <div class="d-flex gap-2 flex-wrap ">
                                <div class="d-flex gap-2 ">
                                    <label class="form-check-label" for="Size-off">Off</label>
                                    <input class="form-check-input" type="radio" name="size" value="0" id="Size-off">
                                </div>
                                <div class="d-flex gap-2">
                                    <label class="form-check-label" for="Size-on">On</label>
                                    <input class="form-check-input" type="radio" name="size" value="1" id="Size-on">
                                </div>
                                <div class="d-flex gap-2">
                                    <label class="form-check-label" for="Size-Optional">Optional</label>
                                    <input class="form-check-input" type="radio" name="size" value="2"
                                        id="Size-Optional">
                                </div>
                            </div>
                        </div>





                    </div>
                    {{-- Forth Row --}}
                    <div class="d-flex justify-content-between flex-wrap p-1">
                        <div class="col-md-6  d-flex gap-2 flex-wrap justify-content-between">
                            <label>Gage-Size :</label>
                            <div class="d-flex gap-2 flex-wrap ">
                                <div class="d-flex gap-2 ">
                                    <label class="form-check-label" for="Gage-Size-off">Off</label>
                                    <input class="form-check-input" type="radio" name="gaze_size" value="0"
                                        id="Gage-Size-off">
                                </div>
                                <div class="d-flex gap-2">
                                    <label class="form-check-label" for="Gage-Size-on">On</label>
                                    <input class="form-check-input" type="radio" name="gaze_size" value="1"
                                        id="Gage-Size-on">
                                </div>
                                <div class="d-flex gap-2">
                                    <label class="form-check-label" for="Gage-Size-Optional">Optional</label>
                                    <input class="form-check-input" type="radio" name="gaze_size" value="2"
                                        id="Gage-Size-Optional">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4  d-flex gap-2 flex-wrap justify-content-between">
                            <label>Weight :</label>
                            <div class="d-flex gap-2 flex-wrap ">
                                <div class="d-flex gap-2 ">
                                    <label class="form-check-label" for="Weight-off">Off</label>
                                    <input class="form-check-input" type="radio" name="weight" value="0"
                                        id="Weight-off">
                                </div>
                                <div class="d-flex gap-2">
                                    <label class="form-check-label" for="Weight-on">On</label>
                                    <input class="form-check-input" type="radio" name="weight" value="1" id="Weight-on">
                                </div>
                                <div class="d-flex gap-2">
                                    <label class="form-check-label" for="Weight-Optional">Optional</label>
                                    <input class="form-check-input" type="radio" name="weight" value="2"
                                        id="Weight-Optional">
                                </div>
                            </div>
                        </div>





                    </div>
                </div>







            </div>



            <div class="col-md-12 form-group mt-4 d-flex justify-content-en d">
                <div class="d-md-flex d-grid align-items-center gap-3">
                    <button type="submit" name="submit" class="btn btn-primary px-4">Submit</button>
                </div>
            </div>
        </form>
    </div>

</div>
@endsection