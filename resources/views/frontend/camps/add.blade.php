@extends('layouts.master')

@section('head-content')
<link href="{{ asset('css/step-form.css') }}" rel="stylesheet">
@endsection

@section('content')
    <div class="container main-container">
        <div class="row">
        @if (session('errors'))
            <div class="alert alert-danger">
                <ul>
                    @foreach (session('errors') as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
            <h4>කදවුරු එකතු කරන්න </h4>

            <div class="stepwizard col-md-offset-3">
                <div class="stepwizard-row setup-panel">
                    <div class="stepwizard-step">
                        <a href="#step-1" type="button" class="btn btn-primary btn-circle">1</a>
                        <p>ග්‍රාම නිළධාරි තොරතුරු</p>
                    </div>
                    <div class="stepwizard-step">
                        <a href="#step-2" type="button" class="btn btn-default btn-circle" disabled="disabled">2</a>
                        <p>මානව තොරතුරු</p>
                    </div>
                    <div class="stepwizard-step">
                        <a href="#step-3" type="button" class="btn btn-default btn-circle" disabled="disabled">3</a>
                        <p>කදවුරේ තොරතුරු</p>
                    </div>
                    <div class="stepwizard-step">
                        <a href="#step-4" type="button" class="btn btn-default btn-circle" disabled="disabled">4</a>
                        <p>ප්‍රවාහන තොරතුරු</p>
                    </div>
                    <div class="stepwizard-step">
                        <a href="#step-5" type="button" class="btn btn-default btn-circle" disabled="disabled">5</a>
                        <p>වෙනත් භාණ්‍ඩ</p>
                    </div>
                    <div class="stepwizard-step">
                        <a href="#step-6" type="button" class="btn btn-default btn-circle" disabled="disabled">6</a>
                        <p>අපදා තක්සේරුව</p>
                    </div>
                </div>
            </div>


            <div class="col-md-12">

                <form name="camps-form" class="form-horizontal" role="form" method="POST" novalidate action="{{ url("/camps/add") }}">
                    {{ csrf_field() }}

                    <div class="row setup-content" id="step-1">
                        <b>ග්‍රාම නිළධාරි තොරතුරු</b>
                        <div class="form-group">
                            <label for="name" class="col-lg-4 control-label">ග්‍රාම නිළධාරි වසම</label>
                            <div class="col-lg-8">
                                <input type="text" class="form-control" id="region" name="region" value="{{ old('region') }}" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="telephone" class="col-lg-4 control-label">ග්‍රාම නිළධාරිගේ නම</label>
                            <div class="col-lg-8">
                                <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" >
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="address" class="col-lg-4 control-label">ග්‍රාම නිළධාරිගේ දුරකතන අංකය</label>
                            <div class="col-lg-8">
                                <input type="text" class="form-control" id="telephone" name="telephone" value="{{ old('telephone') }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="city" class="col-lg-4 control-label">ග්‍රාම නිළධාරිගේ ඊමේල් </label>
                            <div class="col-lg-8">
                                <input type="text" class="form-control" id="email" name="email" value="{{ old('email') }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-lg-offset-2 col-lg-10">
                                <button class="btn btn-primary nextBtn btn-lg pull-right" type="button" >Next</button>
                            </div>
                        </div>
                    </div>
                    <div class="row setup-content" id="step-2">
                        <b>මානව තොරතුරු</b>
                        <div class="form-group">
                            <label for="camp" class="col-lg-4 control-label">පවුල් ගණන</label>
                            <div class="col-lg-8">
                                <input type="number" class="form-control" id="families" name="families" value="{{ old('families') }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="camp" class="col-lg-4 control-label">පිරිමි</label>
                            <div class="col-lg-8">
                                <input type="number" class="form-control" id="men" name="men" value="{{ old('men') }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="camp" class="col-lg-4 control-label">කාන්තා</label>
                            <div class="col-lg-8">
                                <input type="number" class="form-control" id="women" name="women" value="{{ old('women') }}">
                            </div>
                        </div> <div class="form-group">
                            <label for="camp" class="col-lg-4 control-label">ළමුන්</label>
                            <div class="col-lg-8">
                                <input type="number" class="form-control" id="children" name="children" value="{{ old('children') }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="camp" class="col-lg-4 control-label">කුඩා දරුවන්</label>
                            <div class="col-lg-8">
                                <input type="number" class="form-control" id="babies" name="babies" value="{{ old('babies') }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="camp" class="col-lg-4 control-label">ගර්භණී මව්වරුන්</label>
                            <div class="col-lg-8">
                                <input type="number" class="form-control" id="pregnents" name="pregnents" value="{{ old('pregnents') }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="camp" class="col-lg-4 control-label">හදවත් රෝගීන්</label>
                            <div class="col-lg-8">
                                <input type="number" class="form-control" id="heart_patients" name="heart_patients" value="{{ old('heart_patients') }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="camp" class="col-lg-4 control-label">අධි රුධිර පීඩනය සහිත රෝගීන්</label>
                            <div class="col-lg-8">
                                <input type="number" class="form-control" id="blood_pressure_patients" name="blood_pressure_patients" value="{{ old('blood_pressure_patients') }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="camp" class="col-lg-4 control-label">විශේෂ අවශ්‍යතා ඇති අය</label>
                            <div class="col-lg-8">
                                <input type="number" class="form-control" id="special_needs" name="special_needs" value="{{ old('special_needs') }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="camp" class="col-lg-4 control-label">වෙනත් රෝගීන්</label>
                            <div class="col-lg-8">
                                <input type="number" class="form-control" id="other_patients" name="other_patients" value="{{ old('other_patients') }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="camp" class="col-lg-4 control-label">වයෝවෘද්ධ වැඩිහිටියන්</label>
                            <div class="col-lg-8">
                                <input type="number" class="form-control" id="elders" name="elders" value="{{ old('elders') }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-lg-offset-2 col-lg-10">
                                <button class="btn btn-primary nextBtn btn-lg pull-right" type="button" >Next</button>
                            </div>
                        </div>
                    </div>
                    <div class="row setup-content" id="step-3">
                        <b>කදවුරේ තොරතුරු </b>
                        <div class="form-group">
                            <label for="camp" class="col-lg-4 control-label">කදවුරු පිහිටි ස්ථානය</label>
                            <div class="col-lg-8">
                                <input type="text" class="form-control" id="location" name="location" value="{{ old('location') }}" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="camp" class="col-lg-4 control-label">කදවුරු ගණන</label>
                            <div class="col-lg-8">
                                <input type="number" class="form-control" id="count" name="count" value="{{ old('count') }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="camp" class="col-lg-4 control-label">ඟුගෝලීය පිහිටුම</label>
                            <div class="col-lg-8">
                                <input type="text" class="form-control" id="geograghy" name="geograghy" value="{{ old('geograghy') }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="camp" class="col-lg-4 control-label">ගමන් මාර්ගය (නිෂ්චිත සැපයුම් මධ්‍ය ස්ථානයක සිට)</label>
                            <div class="col-lg-8">
                                <textarea class="form-control" rows="4" id="route" name="route" value="{{ old('route') }}" required></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="camp" class="col-lg-4 control-label">උපරිම ජල මට්ටම (පසුගිය ආපදා අවස්ථාවේදි)</label>
                            <div class="col-lg-8">
                                <input type="text" class="form-control" id="pre_max_water_level" name="pre_max_water_level" value="{{ old('pre_max_water_level') }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="camp" class="col-lg-4 control-label">ජලය බැසයාමට ගතවූ කාලය (පසුගිය ආපදා අවස්ථාවේදි)</label>
                            <div class="col-lg-8">
                                <input type="text" class="form-control" id="pre_settle_time" name="pre_settle_time" value="{{ old('pre_settle_time') }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-lg-offset-2 col-lg-10">
                                <button class="btn btn-primary nextBtn btn-lg pull-right" type="button" >Next</button>
                            </div>
                        </div>
                    </div>
                    <div class="row setup-content" id="step-4">
                        <b>ප්‍රවාහන සහ යන්ත්‍ර සැපයුම් කරුවන්</b>
                        <div class="form-group">
                            <label for="camp" class="col-lg-4 control-label">භාවිත කළ හැකි ප්‍රවාහන මාධ්‍ය</label>
                            <div class="col-lg-8">
                                <input type="text" class="form-control" id="transport_categories" name="transport_categories" value="{{ old('transport_categories') }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="camp" class="col-lg-4 control-label">ප්‍රවාහනය සඳහා වාහන/බෝට්ටු සැපයුම් කරුවන්</label>
                            <div class="col-lg-8">
                                <input type="text" class="form-control" id="transport_suppliers" name="transport_suppliers" value="{{ old('transport_suppliers') }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="camp" class="col-lg-4 control-label">බෝට්ටු ජලයට දැමිය හැකි ස්ථාන</label>
                            <div class="col-lg-8">
                                <input type="text" class="form-control" id="boats_usable_locations" name="boats_usable_locations" value="{{ old('boats_usable_locations') }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="camp" class="col-lg-4 control-label">විදුලි රැහැන් ඇති ස්ථාන</label>
                            <div class="col-lg-8">
                                <input type="text" class="form-control" id="current_wires_locations" name="current_wires_locations" value="{{ old('current_wires_locations') }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="camp" class="col-lg-4 control-label">ගස් කැපීමේ යන්ත්‍ර සැපයුම් කරුවන්</label>
                            <div class="col-lg-8">
                                <input type="text" class="form-control" id="tree_cutter_suppliers" name="tree_cutter_suppliers" value="{{ old('tree_cutter_suppliers') }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-lg-offset-2 col-lg-10">
                                <button class="btn btn-primary nextBtn btn-lg pull-right" type="button" >Next</button>
                            </div>
                        </div>
                    </div>
                    <div class="row setup-content" id="step-5">
                        <b>වෙනත් භාණ්‍ඩ</b>
                        <div class="form-group">
                            <label for="camp" class="col-lg-4 control-label">වතුර මෝටර</label>
                            <div class="col-lg-8">
                                <input type="number" class="form-control" id="water_motors" name="water_motors" value="{{ old('water_motors') }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="camp" class="col-lg-4 control-label">ජල ටැංකි</label>
                            <div class="col-lg-8">
                                <input type="number" class="form-control" id="water_tanks" name="water_tanks" value="{{ old('water_tanks') }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="camp" class="col-lg-4 control-label">ජිවිතාරක්‍ෂක ජැකට්ටු</label>
                            <div class="col-lg-8">
                                <input type="number" class="form-control" id="lifesaving_jackets" name="lifesaving_jackets" value="{{ old('lifesaving_jackets') }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="camp" class="col-lg-4 control-label">ස්ථාවර හෝ ජංගම වැසිකිලි පහසුකම්</label>
                            <div class="col-lg-8">
                                <input type="number" class="form-control" id="sanitary" name="sanitary" value="{{ old('sanitary') }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="camp" class="col-lg-4 control-label">විදුලි ජනක යන්ත්‍ර</label>
                            <div class="col-lg-8">
                                <input type="number" class="form-control" id="generators" name="generators" value="{{ old('generators') }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="camp" class="col-lg-4 control-label">විදුලි පන්දම්</label>
                            <div class="col-lg-8">
                                <input type="number" class="form-control" id="torches" name="torches" value="{{ old('torches') }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="camp" class="col-lg-4 control-label">කොට්ට, මෙට්ට, පැදුරු සහ මදුරු දැල්</label>
                            <div class="col-lg-8">
                                <input type="number" class="form-control" id="mosquito_nets_pillows" name="mosquito_nets_pillows" value="{{ old('mosquito_nets_pillows') }}">
                            </div>
                        </div><div class="form-group">
                            <label for="camp" class="col-lg-4 control-label">ආහාර පිසිමේ උපකරණ</label>
                            <div class="col-lg-8">
                                <input type="number" class="form-control" id="cooking_instruments" name="cooking_instruments" value="{{ old('cooking_instruments') }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-lg-offset-2 col-lg-10">
                                <button class="btn btn-primary nextBtn btn-lg pull-right" type="button" >Next</button>
                            </div>
                        </div>
                    </div>
                    <div class="row setup-content" id="step-6">
                        <b>අපදා තක්සේරුව</b>
                        <div class="form-group">
                            <label for="camp" class="col-lg-4 control-label">ජීවිත හානි</label>
                            <div class="col-lg-8">
                                <input type="number" class="form-control" id="deaths" name="deaths" value="{{ old('deaths') }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="camp" class="col-lg-4 control-label">තුවාල කරුවන්</label>
                            <div class="col-lg-8">
                                <input type="number" class="form-control" id="casualties" name="casualties" value="{{ old('casualties') }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="camp" class="col-lg-4 control-label">පූර්ණ හානි (නිවාස)</label>
                            <div class="col-lg-8">
                                <input type="number" class="form-control" id="full_damage_houses" name="full_damage_houses" value="{{ old('full_damage_houses') }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="camp" class="col-lg-4 control-label">අර්‍ධ හානි (නිවාස)</label>
                            <div class="col-lg-8">
                                <input type="number" class="form-control" id="half_damage_houses" name="half_damage_houses" value="{{ old('half_damage_houses') }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="camp" class="col-lg-4 control-label">පූර්ණ හානි (ව්‍යාපාරික)</label>
                            <div class="col-lg-8">
                                <input type="number" class="form-control" id="full_damage_business" name="full_damage_business" value="{{ old('full_damage_business') }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="camp" class="col-lg-4 control-label">අර්‍ධ හානි (ව්‍යාපාරික)</label>
                            <div class="col-lg-8">
                                <input type="number" class="form-control" id="half_damage_business" name="half_damage_business" value="{{ old('half_damage_business') }}">
                            </div>
                        </div>
<!--                        <div class="form-group">-->
<!--                            <div class="col-lg-10 col-md-offset-2">-->
<!--                                {!! app('captcha')->render(); !!}-->
<!--                            </div>-->
<!--                        </div>-->
                        <div class="form-group">
                            <div class="col-lg-offset-2 col-lg-10">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </div>
                    </div>

                </form>
            </div><!-- /.col-md-12 -->
        </div><!-- /.row -->

    </div><!-- /.container -->
@endsection

@section('js-content')
<script src="{{ asset('js/step-form.js') }}"></script>
@endsection