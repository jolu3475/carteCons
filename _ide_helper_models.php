<?php

// @formatter:off
// phpcs:ignoreFile
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property int $captchaId
 * @property int $regularId
 * @property string $numero
 * @property string|null $dateRemise
 * @property string|null $dateExpiration
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property int $valide
 * @property int $vu
 * @property-read \App\Models\captcha $captcha
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Erreur> $erreur
 * @property-read int|null $erreur_count
 * @property-read \App\Models\Notification|null $notification
 * @property-read \App\Models\Regular $regular
 * @method static \Illuminate\Database\Eloquent\Builder|Carte newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Carte newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Carte query()
 * @method static \Illuminate\Database\Eloquent\Builder|Carte whereCaptchaId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Carte whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Carte whereDateExpiration($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Carte whereDateRemise($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Carte whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Carte whereNumero($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Carte whereRegularId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Carte whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Carte whereValide($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Carte whereVu($value)
 * @mixin \Eloquent
 */
	#[\AllowDynamicProperties]
	class IdeHelperCarte {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property int $carteId
 * @property int $regularId
 * @property string $contenu
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Carte|null $carte
 * @property-read \App\Models\User|null $user
 * @method static \Illuminate\Database\Eloquent\Builder|Erreur newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Erreur newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Erreur query()
 * @method static \Illuminate\Database\Eloquent\Builder|Erreur whereCarteId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Erreur whereContenu($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Erreur whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Erreur whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Erreur whereRegularId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Erreur whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	#[\AllowDynamicProperties]
	class IdeHelperErreur {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property int $repexId
 * @property string $codePays
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Pays $pays
 * @property-read \App\Models\Repex $repex
 * @method static \Illuminate\Database\Eloquent\Builder|Juridiction newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Juridiction newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Juridiction query()
 * @method static \Illuminate\Database\Eloquent\Builder|Juridiction whereCodePays($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Juridiction whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Juridiction whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Juridiction whereRepexId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Juridiction whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	#[\AllowDynamicProperties]
	class IdeHelperJuridiction {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property int $carteId
 * @property string $message
 * @property int $vu
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Carte $carte
 * @method static \Illuminate\Database\Eloquent\Builder|Notification newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Notification newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Notification query()
 * @method static \Illuminate\Database\Eloquent\Builder|Notification whereCarteId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Notification whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Notification whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Notification whereMessage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Notification whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Notification whereVu($value)
 * @mixin \Eloquent
 */
	#[\AllowDynamicProperties]
	class IdeHelperNotification {}
}

namespace App\Models{
/**
 * 
 *
 * @property string $code
 * @property string $nom
 * @property string $indicatif
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Carte|null $carte
 * @property-read \App\Models\Juridiction|null $juridictions
 * @property-read \App\Models\Repex|null $repexs
 * @method static \Illuminate\Database\Eloquent\Builder|Pays newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Pays newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Pays query()
 * @method static \Illuminate\Database\Eloquent\Builder|Pays whereCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Pays whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Pays whereIndicatif($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Pays whereNom($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Pays whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	#[\AllowDynamicProperties]
	class IdeHelperPays {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property string $codePays
 * @property string $nom
 * @property string $prenom
 * @property string $email
 * @property string $dateNais
 * @property string $lieuNais
 * @property string $sitMat
 * @property string $proffession
 * @property int|null $nbEnf
 * @property string $adr
 * @property string $tel
 * @property string $numPass
 * @property string $expPass
 * @property string $arrExt
 * @property string $img
 * @property string $slug
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Carte|null $carte
 * @property-read \App\Models\Pays $pays
 * @method static \Illuminate\Database\Eloquent\Builder|Regular newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Regular newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Regular query()
 * @method static \Illuminate\Database\Eloquent\Builder|Regular whereAdr($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Regular whereArrExt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Regular whereCodePays($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Regular whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Regular whereDateNais($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Regular whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Regular whereExpPass($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Regular whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Regular whereImg($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Regular whereLieuNais($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Regular whereNbEnf($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Regular whereNom($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Regular whereNumPass($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Regular wherePrenom($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Regular whereProffession($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Regular whereSitMat($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Regular whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Regular whereTel($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Regular whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	#[\AllowDynamicProperties]
	class IdeHelperRegular {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property string $codePays
 * @property string $label
 * @property string $adr
 * @property string $email
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Juridiction|null $juridiction
 * @property-read \App\Models\Pays $pays
 * @method static \Illuminate\Database\Eloquent\Builder|Repex newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Repex newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Repex query()
 * @method static \Illuminate\Database\Eloquent\Builder|Repex whereAdr($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Repex whereCodePays($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Repex whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Repex whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Repex whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Repex whereLabel($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Repex whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	#[\AllowDynamicProperties]
	class IdeHelperRepex {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property int $userid
 * @property string $user_agent
 * @property string $ip_address
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|Session newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Session newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Session query()
 * @method static \Illuminate\Database\Eloquent\Builder|Session whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Session whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Session whereIpAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Session whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Session whereUserAgent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Session whereUserid($value)
 * @mixin \Eloquent
 */
	#[\AllowDynamicProperties]
	class IdeHelperSession {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property \Illuminate\Support\Carbon|null $email_verified_at
 * @property mixed|null $password
 * @property int $role
 * @property string $slug
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Erreur> $erreurs
 * @property-read int|null $erreurs_count
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection<int, \Illuminate\Notifications\DatabaseNotification> $notifications
 * @property-read int|null $notifications_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Session> $sessions
 * @property-read int|null $sessions_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Laravel\Sanctum\PersonalAccessToken> $tokens
 * @property-read int|null $tokens_count
 * @method static \Database\Factories\UserFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User query()
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereRole($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	#[\AllowDynamicProperties]
	class IdeHelperUser {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property string $email
 * @property int $token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|VerifEmail newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|VerifEmail newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|VerifEmail query()
 * @method static \Illuminate\Database\Eloquent\Builder|VerifEmail whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|VerifEmail whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|VerifEmail whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|VerifEmail whereToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|VerifEmail whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	#[\AllowDynamicProperties]
	class IdeHelperVerifEmail {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property string $test
 * @property string $ip_address
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Carte|null $carte
 * @method static \Illuminate\Database\Eloquent\Builder|captcha newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|captcha newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|captcha query()
 * @method static \Illuminate\Database\Eloquent\Builder|captcha whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|captcha whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|captcha whereIpAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|captcha whereTest($value)
 * @method static \Illuminate\Database\Eloquent\Builder|captcha whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	#[\AllowDynamicProperties]
	class IdeHelpercaptcha {}
}

