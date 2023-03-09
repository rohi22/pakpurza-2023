"use strict";



// Class definition

var KTAvatarDemo = function () {

	// Private functions

	var initDemos = function () {

		var avatar1 = new KTAvatar('kt_user_avatar_1');
        var avatar2 = new KTAvatar('kt_user_avatar_2');
        var avatar3 = new KTAvatar('kt_user_avatar_3');
		var avatar4 = new KTAvatar('kt_user_avatar_4');
		var avatar5 = new KTAvatar('kt_user_avatar_5');
		var avatar6 = new KTAvatar('kt_user_avatar_6');
		var avatar7 = new KTAvatar('kt_user_avatar_7');
		var avatar8 = new KTAvatar('kt_user_avatar_8');
		var avatar9 = new KTAvatar('kt_user_avatar_9');
		var avatar10 = new KTAvatar('kt_user_avatar_10');
		var avatar11 = new KTAvatar('kt_user_avatar_11');
		var avatar12 = new KTAvatar('kt_user_avatar_12');
		
      

	}



	return {

		// public functions

		init: function() {

			initDemos();

		}

	};

}();



KTUtil.ready(function() {

	KTAvatarDemo.init();

});

