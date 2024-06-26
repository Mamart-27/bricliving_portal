<?php

?>
<div class="modal fade" id="filterModal" tabindex="-1" role="dialog" aria-labelledby="filterModalTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="filterModalTitle">Filter Options</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="form-filter" action="#">
                    <h4>Properties</h4>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="property_phase" class="col-form-label">{{ __('Property Phase') }}</label>
                                <select class="form-control selectpicker" multiple data-live-search="true"
                                    id="property_phase" data-actions-box="true">
                                    @foreach($filters['property_phase'] as $pp)
                                    <option value="{{$pp->property_phase}}">{{$pp->property_phase}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="city" class="col-form-label">{{ __('City') }}</label>
                                <select class="form-control selectpicker" multiple data-live-search="true" id="city"
                                    data-actions-box="true">
                                    @foreach($filters['city'] as $c)
                                    <option value="{{$c->city}}">{{$c->city}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="no_bric_beds"
                                            class="col-form-label">{{ __('No. Bric Beds') }}</label>
                                        <select class="form-control selectpicker" multiple data-live-search="true"
                                            id="no_bric_beds" data-actions-box="true">
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                            <option value="6">6</option>
                                            <option value="7">7</option>
                                            <option value="8">8</option>
                                            <option value="9">9</option>
                                            <option value="10">10</option>
                                            <option value="11">11</option>
                                            <option value="12">12</option>
                                            <option value="13">13</option>
                                            <option value="14">14</option>
                                            <option value="15">15</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="status" class="col-form-label">{{ __('Letting Status') }}</label>
                                        <select class="form-control selectpicker" multiple data-live-search="true"
                                            id="status" data-actions-box="true">
                                            @foreach($filters['letting_status'] as $ls)
                                                <option value="{{$ls->id}}">{{$ls->letting_status_name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="postcode" class="col-form-label">{{ __('Postcode') }}</label>
                                <div class="row mb-1">
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" id="postcode" autocomplete="off">
                                    </div>
                                    <div class="col-md-3 align-items-center d-flex justify-content-end">
                                        <button type="button" class="btn btn-sm btn-success" id="addbtn"><i
                                                class="fas fa-plus fa-sm"></i> ADD</button>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12 postcode-list lists d-flex">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="entity" class="col-form-label">{{ __('Entity') }}</label>
                                <select class="form-control selectpicker" multiple data-live-search="true" id="entity"
                                    data-actions-box="true">
                                    @foreach($filters['entity'] as $e)
                                    <option value="{{$e->entity}}">{{$e->entity}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="area" class="col-form-label">{{ __('Area') }}</label>
                                <select class="form-control selectpicker" multiple data-live-search="true" id="area"
                                    data-actions-box="true">
                                    @foreach($filters['area'] as $a)
                                    <option value="{{$a->area}}">{{$a->area}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="address" class="col-form-label">{{ __('House No./Street') }}</label>
                                <div class="row mb-1">
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" id="address" autocomplete="off">
                                    </div>
                                    <div class="col-md-3 align-items-center d-flex justify-content-end">
                                        <button type="button" class="btn btn-sm btn-success" id="addbtn"><i
                                                class="fas fa-plus fa-sm"></i> ADD</button>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12 address-list lists d-flex">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @if(isset(Auth::user()->id) == 1 && request()->is('letting'))
                        <h4>Lettings</h4>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="property_contract_status" class="col-form-label">{{ __('Contract Status') }}</label>
                                    <select class="form-control selectpicker" multiple data-live-search="true"
                                        id="property_contract_status" data-actions-box="true">
                                        <option value="Available">Available</option>
                                        <option value="Pending Info">Pending Info</option>
                                        <option value="App Sent">App Sent</option>
                                        <option value="Contract Sent">Contract Sent</option>
                                        <option value="In Refurb">In Refurb</option>
                                        <option value="Signed">Signed</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    @endif
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button id="clear-filter" type="button" class="btn btn-warning">Clear</button>
                <button id="filter-view" type="button" class="btn btn-primary" data-dismiss="modal">View</button>
            </div>
        </div>
    </div>
</div>