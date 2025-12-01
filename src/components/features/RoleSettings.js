import { useState, useEffect } from '@wordpress/element';
import { fetchRoles } from '../../api';
import PageSelector from '../common/PageSelector';

const RoleSettings = ( { settings, updateSettings, pages, isPagesLoading } ) => {
    const [ roles, setRoles ] = useState( {} );
    const { role_redirects } = settings;

    useEffect( () => {
        fetchRoles().then( ( data ) => {
            setRoles( data );
        } );
    }, [] );

    const handleRoleChange = ( role, url ) => {
        const newRoleRedirects = { ...role_redirects, [ role ]: url };
        updateSettings( { role_redirects: newRoleRedirects } );
    };

    return (
        <div className="redalo-section">
            <h2>Role-Based Redirection</h2>
            <p style={{ marginBottom: '20px', color: '#666' }}>Set specific redirect URLs for each user role. These will override the general settings above.</p>
            
            { Object.entries( roles ).map( ( [ key, role ] ) => (
                <div key={ key } className="redalo-field">
                    <label>{ role.name }</label>
                    <PageSelector
                        value={ role_redirects[ key ] || '' }
                        onChange={ ( value ) => handleRoleChange( key, value ) }
                        pages={ pages }
                        isLoading={ isPagesLoading }
                    />
                </div>
            ) ) }
        </div>
    );
};

export default RoleSettings;
