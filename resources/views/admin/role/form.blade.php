<md-input-container class="md-block">
    <label>Title</label>
    <input type="text" md-maxlength="20" required md-no-asterisk name="title" ng-model="title">
    <div ng-messages="roleForm.title.$error">
        <div ng-message="required">This is required.</div>
        <div ng-message="md-maxlength">The description must be less than 20 characters long.</div>
    </div>
</md-input-container>

@foreach ($roleModules as $model)
    <ul>
        <li>
            {{ $model->title }}
        </li>


        <ul>
            <li>

                <md-checkbox ng-checked="exists(1, {{ $model->title }}_selected, media)"
                    ng-click="toggle(1, {{ $model->title }}_selected, {{ $model->title }} )"> View

                    <span ng-if="exists(1, {{ $model->title }}_selected, {{ $model->title }})">
                        <i style="color: green" class="fa fa-check-circle-o" aria-hidden="true"></i>
                    </span>

                </md-checkbox>

            </li>

            <li>

                <md-checkbox ng-checked="exists(2, {{ $model->title }}_selected, media)"
                    ng-click="toggle(2, {{ $model->title }}_selected, {{ $model->title }})"> Create

                    <span ng-if="exists(2, {{ $model->title }}_selected, {{ $model->title }})">
                        <i style="color: green" class="fa fa-check-circle-o" aria-hidden="true"></i>
                    </span>

                </md-checkbox>

            </li>

            <li>

                <md-checkbox ng-checked="exists(3, {{ $model->title }}_selected, media)"
                    ng-click="toggle(3, {{ $model->title }}_selected, {{ $model->title }})">Update

                    <span ng-if="exists(3, {{ $model->title }}_selected, {{ $model->title }})">
                        <i style="color: green" class="fa fa-check-circle-o" aria-hidden="true"></i>
                    </span>

                </md-checkbox>

            </li>

            <li>
                <md-checkbox ng-checked="exists(4, {{ $model->title }}_selected, media)"
                    ng-click="toggle(4, {{ $model->title }}_selected, {{ $model->title }})"> Delete

                    <span ng-if="exists(4, {{ $model->title }}_selected, {{ $model->title }})">
                        <i style="color: green" class="fa fa-check-circle-o" aria-hidden="true"></i>
                    </span>

                </md-checkbox>
            </li>
        </ul>
    </ul>
@endforeach

<input type="text" readonly name="excel_file" value="@{{ excel_file }}">
<input type="text" readonly name="search_order" value="@{{ search_order }}">
<input type="text" readonly name="module" value="@{{ module }}">
<input type="text" readonly name="role" value="@{{ role }}">
<input type="text" readonly name="order" value="@{{ order }}">
<input type="text" readonly name="user" value="@{{ user }}">
