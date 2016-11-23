@extends('layout')


@section('content')

    <div class="row">
        <div class="col-md-6 col-xs-12">
            <p>Create meeting</p>


            <form id="create-meeting">
                <div class="form-group">
                    <p style="color:red;" data-bind="text: $root.message"></p>
                </div>
                <div class="form-group">
                    <label class="control-label">title</label>
                    <input class="form-control required" type="text" id="title" name="title" data-bind="value: $root.title" >
                </div>
                <div class="form-group">
                    <label class="control-label">description</label>
                    <textarea class="form-control required" id="description" name="description" data-bind="value: $root.description" ></textarea>
                </div>
                <div class="form-group">
                    <label class="control-label">time </label>
                    <input class="form-control required" type="text" id="time" name="time" data-bind="value: $root.time" >
                </div>
                <div class="form-group">
                    <button data-bind="click: $root.clickCreate" >Create</button>
                </div>

            </form>
        </div>
    </div>



    <script>
        function MeetingViewModel() {
            var that = this;

            that.title = ko.observable('');
            that.description = ko.observable('');
            that.time = ko.observable('201610251330CET');
            that.message = ko.observable('');

            that.url = "{{URL::to('/')}}/api/v1/meeting";

            that.clickCreate = function () {

                $.ajax({
                    url: that.url,
                    contentType: 'application/json',
                    method: "POST",
                    data: JSON.stringify({
                        title: that.title(),
                        description: that.description(),
                        time: that.time()
                    }),
                    success: function (result) {
                        if(result != null && result.hasOwnProperty('msg')) {
                            that.message(result.msg);

                        }
                    }
                });

            };
        }


        $(function () {
            $("#create-meeting").validate();

            var vm = new MeetingViewModel();
            ko.applyBindings(vm, document.getElementById("create-meeting"));




        });

    </script>


@stop