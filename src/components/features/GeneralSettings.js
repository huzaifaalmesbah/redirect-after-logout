import { RadioControl, CheckboxControl } from '@wordpress/components';
import PageSelector from '../common/PageSelector';

const GeneralSettings = ( { settings, updateSettings, pages, isPagesLoading } ) => {
    const { redirect_type, logout_redirect_url, use_safe_redirect } = settings;

    return (
        <div className="redalo-section">
            <h2>General Settings</h2>
            
            <RadioControl
                label="Redirect To"
                selected={ redirect_type }
                options={ [
                    { label: 'Home Page', value: 'home' },
                    { label: 'Current Page', value: 'current' },
                    { label: 'Custom Redirect', value: 'custom' },
                ] }
                onChange={ ( value ) => updateSettings( { redirect_type: value } ) }
            />

            { redirect_type === 'custom' && (
                <PageSelector
                    label="Custom Redirect URL"
                    value={ logout_redirect_url }
                    onChange={ ( value ) => updateSettings( { logout_redirect_url: value } ) }
                    pages={ pages }
                    isLoading={ isPagesLoading }
                />
            ) }

            <div className="redalo-field redalo-safe-redirect">
                <CheckboxControl
                    label="Safe Redirect"
                    help="Check this box to make sure the redirect is safe and only goes to the same site."
                    checked={ use_safe_redirect }
                    onChange={ ( value ) => updateSettings( { use_safe_redirect: value } ) }
                    __nextHasNoMarginBottom
                />
            </div>
        </div>
    );
};

export default GeneralSettings;
