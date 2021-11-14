<?php

// This class was automatically generated by a giiant build task
// You should not change it manually as it will be overwritten on next build

namespace rhertogh\Yii2Oauth2Server\models\base;

use Yii;

/**
 * This is the base-model class for table "oauth2_client".
 *
 * @property integer $id
 * @property string $identifier
 * @property integer $type
 * @property string $secret
 * @property string $name
 * @property string $logo_uri
 * @property string $tos_uri
 * @property string $contacts
 * @property array $redirect_uris
 * @property integer $token_types
 * @property integer $grant_types
 * @property integer $scope_access
 * @property integer $user_account_selection
 * @property integer $allow_auth_code_without_pkce
 * @property integer $skip_authorization_if_scope_is_allowed
 * @property integer $client_credentials_grant_user_id
 * @property integer $oidc_allow_offline_access_without_consent
 * @property string $oidc_userinfo_encrypted_response_alg
 * @property integer $enabled
 * @property integer $created_at
 * @property integer $updated_at
 *
 * @property \rhertogh\Yii2Oauth2Server\models\Oauth2AccessToken[] $accessTokens
 * @property \rhertogh\Yii2Oauth2Server\models\Oauth2AuthCode[] $authCodes
 * @property \rhertogh\Yii2Oauth2Server\models\Oauth2ClientScope[] $clientScopes
 * @property \rhertogh\Yii2Oauth2Server\models\Oauth2Scope[] $scopes
 * @property \rhertogh\Yii2Oauth2Server\models\Oauth2UserClient[] $userClients
 * @property string $aliasModel
 *
 * phpcs:disable Generic.Files.LineLength.TooLong
 */
abstract class Oauth2Client extends \rhertogh\Yii2Oauth2Server\models\base\Oauth2BaseActiveRecord
{


    /**
     * @inheritdoc
     */
    //public static $tableName = 'oauth2_client';



    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['identifier', 'name', 'created_at', 'updated_at'], 'required'],
            [['type', 'token_types', 'grant_types', 'scope_access', 'user_account_selection', 'allow_auth_code_without_pkce', 'skip_authorization_if_scope_is_allowed', 'client_credentials_grant_user_id', 'oidc_allow_offline_access_without_consent', 'enabled', 'created_at', 'updated_at'], 'integer'],
            [['secret', 'contacts'], 'string'],
            [['redirect_uris'], 'safe'],
            [['identifier', 'name', 'logo_uri', 'tos_uri', 'oidc_userinfo_encrypted_response_alg'], 'string', 'max' => 255],
            [['identifier'], 'unique']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('oauth2', 'ID'),
            'identifier' => Yii::t('oauth2', 'Identifier'),
            'type' => Yii::t('oauth2', 'Type'),
            'secret' => Yii::t('oauth2', 'Secret'),
            'name' => Yii::t('oauth2', 'Name'),
            'logo_uri' => Yii::t('oauth2', 'Logo Uri'),
            'tos_uri' => Yii::t('oauth2', 'Tos Uri'),
            'contacts' => Yii::t('oauth2', 'Contacts'),
            'redirect_uris' => Yii::t('oauth2', 'Redirect Uris'),
            'token_types' => Yii::t('oauth2', 'Token Types'),
            'grant_types' => Yii::t('oauth2', 'Grant Types'),
            'scope_access' => Yii::t('oauth2', 'Scope Access'),
            'user_account_selection' => Yii::t('oauth2', 'User Account Selection'),
            'allow_auth_code_without_pkce' => Yii::t('oauth2', 'Allow Auth Code Without Pkce'),
            'skip_authorization_if_scope_is_allowed' => Yii::t('oauth2', 'Skip Authorization If Scope Is Allowed'),
            'client_credentials_grant_user_id' => Yii::t('oauth2', 'Client Credentials Grant User ID'),
            'oidc_allow_offline_access_without_consent' => Yii::t('oauth2', 'Oidc Allow Offline Access Without Consent'),
            'oidc_userinfo_encrypted_response_alg' => Yii::t('oauth2', 'Oidc Userinfo Encrypted Response Alg'),
            'enabled' => Yii::t('oauth2', 'Enabled'),
            'created_at' => Yii::t('oauth2', 'Created At'),
            'updated_at' => Yii::t('oauth2', 'Updated At'),
        ];
    }

    /**
     * @return \rhertogh\Yii2Oauth2Server\interfaces\models\queries\Oauth2AccessTokenQueryInterface|\yii\db\ActiveQuery
     */
    public function getAccessTokens()
    {
        return $this->hasMany(\rhertogh\Yii2Oauth2Server\models\Oauth2AccessToken::className(), ['client_id' => 'id'])->inverseOf('client');
    }

    /**
     * @return \rhertogh\Yii2Oauth2Server\interfaces\models\queries\Oauth2AuthCodeQueryInterface|\yii\db\ActiveQuery
     */
    public function getAuthCodes()
    {
        return $this->hasMany(\rhertogh\Yii2Oauth2Server\models\Oauth2AuthCode::className(), ['client_id' => 'id'])->inverseOf('client');
    }

    /**
     * @return \rhertogh\Yii2Oauth2Server\interfaces\models\queries\Oauth2ClientScopeQueryInterface|\yii\db\ActiveQuery
     */
    public function getClientScopes()
    {
        return $this->hasMany(\rhertogh\Yii2Oauth2Server\models\Oauth2ClientScope::className(), ['client_id' => 'id'])->inverseOf('client');
    }

    /**
     * @return \rhertogh\Yii2Oauth2Server\interfaces\models\queries\Oauth2ScopeQueryInterface|\yii\db\ActiveQuery
     */
    public function getScopes()
    {
        return $this->hasMany(\rhertogh\Yii2Oauth2Server\models\Oauth2Scope::className(), ['id' => 'scope_id'])->via('clientScopes');
    }

    /**
     * @return \rhertogh\Yii2Oauth2Server\interfaces\models\queries\Oauth2UserClientQueryInterface|\yii\db\ActiveQuery
     */
    public function getUserClients()
    {
        return $this->hasMany(\rhertogh\Yii2Oauth2Server\models\Oauth2UserClient::className(), ['client_id' => 'id'])->inverseOf('client');
    }



    /**
     * @inheritdoc
     * @return \rhertogh\Yii2Oauth2Server\interfaces\models\queries\Oauth2ClientQueryInterface|\yii\db\ActiveQuery the active query used by this AR class.
     */
    public static function find()
    {
        return Yii::createObject(\rhertogh\Yii2Oauth2Server\interfaces\models\queries\Oauth2ClientQueryInterface::class, [get_called_class()]);
    }
}
