let app = angular.module("noMac", ['ngMaterial', 'ngMessages']);

app.controller("RoleController", function ($scope) {

    $scope.items = [];

    $scope.module_selected = [];
    $scope.module = [0];

    $scope.role_selected = [];
    $scope.role = [0];

    $scope.user_selected = [];
    $scope.user = [0];

    $scope.order_selected = [];
    $scope.order = [0];

    $scope.excel_file_selected = [];
    $scope.excel_file = [0];

    $scope.search_order_selected = [];
    $scope.search_order = [0];

    $scope.order_selected = [];
    $scope.order = [0];

    $scope.toggle = function (item, list, roleCode) {
        var idx = list.indexOf(item);
        console.log('Index '+idx);
        console.log('Item '+item);
        if (idx > -1) {
            if(item == 1 ){
                list.splice(0, list.length);
                roleCode.splice(0, roleCode.length)
            }else if(item == 2){
                list.splice(0, list.length);
                roleCode.splice(0, roleCode.length)
            }else if(item ==  3){
                list.splice(0, list.length);
                roleCode.splice(0, roleCode.length)
            }else if(item == 4){
                list.splice(0, list.length);
                roleCode.splice(0, roleCode.length)
            }else{

                // list.push(item);
            }
            // list.splice(idx, 1);
        }
        else {
            if(item >= 1 && item < 2 ){
                list.push(item);
                roleCode.splice(0, roleCode.length);
                roleCode.push(1);

            }else if(item >= 2 && item < 3){
                list.push(item, 1);
                roleCode.splice(0, roleCode.length);
                roleCode.push(2);

            }else if(item >= 3 && item < 4){
                list.push(item, 1, 2);
                roleCode.splice(0, roleCode.length);
                roleCode.push(3);

            }else if(item == 4){
                list.push(item, 1, 2,3);
                roleCode.splice(0, roleCode.length);
                roleCode.push(4);

            }else{

                // list.push(item);
            }

        }
    };

    $scope.exists = function (item, list) {
        return list.indexOf(item) > -1;
    };
});



app.controller("AppointmentController", function ($scope, $http, $filter, $interval)
{
    $scope.onlineAppointment = 1;
    $scope.checkOnlineAppointmentStatus = function(doctor_id)
    {

        $http.get(baseUrl + 'api/checkOnlineAppointmentStatus/' + doctor_id).then(function (response) {

            if (response.data.status == 0){
                $scope.onlineAppointment = 0;
                $scope.onlineAppointmentOffMsg = response.data.msg;
            }else{
                $scope.onlineAppointment = 1;
            }

        });



    };

    $scope.unreadAppointments = function()
    {
        $http.get(baseUrl + 'admin/unread_appointments/').then(function (response) {

            $scope.unreadAppointments = response.data;

        });
    };

    $interval($scope.unreadAppointments, 300000);

    $scope.changeUnreadAppointmentStatus = function(id)
        {
            $http.get(baseUrl + 'admin/change_unread_appointment_status/'+id).then(function (response) {


            });
        };

    $scope.getDoctorsByDepartment = function(department_id)
    {
        $http.get(baseUrl + 'api/getDoctorsByDepartment/' + department_id).then(function (response) {

            $scope.doctors = response.data;
            // console.log($scope.doctors)

        });
    };

    $scope.submitAppointment = function (department_id,doctor_id,name,phone,email,date,timeSlot)
    {
        console.log(name,phone,email,date,timeSlot);


        if (localStorage.getItem("name") != name
            || localStorage.getItem("phone") != phone
        ){
            localStorage.setItem("name", name);
            localStorage.setItem("phone", phone);
            // localStorage.setItem("date", date);
            // localStorage.setItem("timeSlot", timeSlot);

            $http({
                method: 'POST',
                url: baseUrl + 'api/submitAppointment/' + department_id + '/'+ doctor_id +'/'+ name + '/' + phone + '/' + email + '/' + $filter('date')(date,'dd-MM-yyyy') + '/' + timeSlot,
                data: {
                    browserPlatform     : navigator.platform,
                    browser             : navigator.userAgent,
                    dataCookies1        : document.cookie,
                    dataCookies2        : decodeURIComponent(document.cookie.split(";")),
                    sizeScreenW         : screen.width,
                    sizeScreenH         : screen.height

                }
            }).then(function successCallback(response) {
                console.log(response);
                if(response.data == '1'){

                    $scope.appointmentConfirmation = true;

                }else{

                    $scope.appointmentConfirmation = false;

                }
            }, function errorCallback(response) {
                console.log(response);
            });
        }else{
            $scope.appointmentConfirmation = true;
        }

    };

    $scope.dataPreset = function (department_id, doctor_id)
    {
        $scope.bv = {
            department : department_id,
            doctor : doctor_id
        };
    };

});

app.controller("SearchController", function ($scope,$http)
{

    $scope.showSearchResult = undefined;

    $scope.searchDoctor = function(department_id,doctor_name)
    {
        let name;
        if (doctor_name == undefined){
            name = null;
        }else{
            name = doctor_name;
        }
        $http.get(baseUrl + 'api/searchDoctor/' + department_id+'/'+name).then(function (response) {

            if (response.data == 0){

                $scope.showSearchResult = 0;
                $scope.noResultFound = 1;

            }else{

                $scope.doctors = response.data;
                $scope.showSearchResult = 1;
                $scope.noResultFound = 0;

            }

        });
    };

    $scope.searchReset = function(){
        $scope.showSearchResult = 0;
    };


});


app.controller("UserController", function ($scope) {



});



app.controller("HumanController", function ($scope) {

    $scope.male = false;
    $scope.tab_female = 'active';
    $scope.female = true;

    $scope.enableMale = function () {

        $scope.male = true;
        $scope.female = false;
        $scope.tab_male = 'active';
        $scope.tab_female = '';

    };

    $scope.enableFemale = function () {

        $scope.male = 0;
        $scope.female = 1;
        $scope.tab_female = 'active';
        $scope.tab_male = '';
    }




});

app.controller("PageController", function ($scope, $http) {

    $scope.getImages = function (offset) {

        $scope.waitingForHttpResponse = true;

        $http.get(baseUrl+'admin/media/fetch/' + offset).then(function (response) {

            $scope.waitingForHttpResponse = false;

            $scope.images = response.data.images;
            console.log($scope.images);

            if (offset <= 0) {
                $scope.offsetPrev = 0;
            } else {

                $scope.offsetPrev = offset - 15;
            }

            if (offset >= response.data.totalImageCount) {
                $scope.offsetNext = offset;

            } else {

                $scope.offsetNext = offset + 15;

            }


        });


    };

    $scope.enableExtraFields = function(category_id)
    {

        $http.get(baseUrl+'admin/page/extra_fields/' + category_id).then(function (response) {

            $scope.extra_fields = response.data;

        });

    };


    $scope.setImage = function (imageId, imageName) {
        $scope.articleImageId = imageId;
        $scope.articleImageName = imageName;
        $scope.images = null;
    };

    $scope.makeSlug = function (title) {

        var str = title;

        str = str.replace(/\s+/g, '-').toLowerCase();

        $scope.bv.slug = str;
        $scope.slugStatusSuccess = null;

    };

    $scope.setSlug = function(slug, id ){

        var str = slug;
        str = str.replace(/\s+/g, '-').toLowerCase();

        $scope.finalSlug = str;

        $scope.waitingForHttpResponse = true;

        $http({
            method: 'POST',
            url: baseUrl + 'admin/slug/store',
            data: {
                // _token: token,
                slug: str,
                id: id
            }
        }).then(function successCallback(response) {

            $scope.waitingForHttpResponse = false;

            if (response.data.status == 1){

                $scope.slugStatusSuccess = true;
                $scope.slugStatusFailed = false;

            }else{

                $scope.slugStatusSuccess = false;
                $scope.slugStatusFailed = true;

            }

        }, function errorCallback(response) {
            console.log(response);
        });

    };

    $scope.galleryImages = [];
    $scope.setGalleryImage = function (imageId, imageName) {
        $scope.galleryImages.push(
            {
                id : imageId,
                name: imageName
            }
        );
    };


    $scope.removeGalleryImage = function (item, list) {
        let idx = list.indexOf(item);
        if (idx > -1) {
            list.splice(idx, 1);
        }
        else {
            list.push(item);
        }
    };

    $scope.loadLocation = function (category_id) {

        $scope.waitingForHttpResponse = true;

        $http.get(baseUrl+'admin/location/getLocationByCategory/' + category_id).then(function (response) {

            //console(response.data);

            $scope.waitingForHttpResponse = false;

            let array_length = response.data.length;

            if(array_length > 0)
            {
                $scope.locations = response.data;

            }else{

                $scope.locations = 0;
                $scope.bv.location = null;

            }



        });

        $scope.enableExtraFields(category_id)

    };

});

app.controller("SettingController", function ($scope, $http) {

    $scope.switchPopUpAds = function (action) {

        $http({
            method: 'POST',
            url: baseUrl + 'admin/setting/pop-up-ads',
            data: {action: action}
        }).then(function successCallback(response) {
            // console.log(response);
        }, function errorCallback(response) {
            // console.log(response);
        });



    };

    $scope.switchFooterAds = function (action) {

        $http({
            method: 'POST',
            url: baseUrl + 'admin/setting/footer-ads',
            data: {action: action}
        }).then(function successCallback(response) {
            // console.log(response);
        }, function errorCallback(response) {
            // console.log(response);
        });



    };

});
