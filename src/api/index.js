import apiFetch from '@wordpress/api-fetch';

/**
 * Fetch settings from the API.
 */
export const fetchSettings = async () => {
    return await apiFetch( { path: '/redalo/v1/settings' } );
};

/**
 * Save settings to the API.
 * 
 * @param {Object} settings The settings object to save.
 */
export const saveSettings = async ( settings ) => {
    return await apiFetch( {
        path: '/redalo/v1/settings',
        method: 'POST',
        data: settings,
    } );
};

/**
 * Fetch pages from the API.
 */
export const fetchPages = async () => {
    return await apiFetch( { path: '/wp/v2/pages?per_page=100' } );
};

/**
 * Fetch roles from the API.
 */
export const fetchRoles = async () => {
    return await apiFetch( { path: '/redalo/v1/roles' } );
};
