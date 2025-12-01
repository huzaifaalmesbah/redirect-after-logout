import { useState, useEffect } from '@wordpress/element';
import { fetchSettings, saveSettings as apiSaveSettings } from '../api';

export const useSettings = () => {
    const [ settings, setSettings ] = useState( null );
    const [ isSaving, setIsSaving ] = useState( false );
    const [ notices, setNotices ] = useState( [] );

    useEffect( () => {
        const loadSettings = async () => {
            try {
                const data = await fetchSettings();
                setSettings( data );
            } catch ( error ) {
                setNotices( [ { id: Date.now(), content: 'Error loading settings.', status: 'error' } ] );
            }
        };

        loadSettings();
    }, [] );

    const updateSettings = ( newSettings ) => {
        setSettings( { ...settings, ...newSettings } );
    };

    const saveSettings = async () => {
        setIsSaving( true );
        try {
            const data = await apiSaveSettings( settings );
            setSettings( data );
            setNotices( [ { id: Date.now(), content: 'Settings saved successfully.', status: 'success' } ] );
        } catch ( error ) {
            setNotices( [ { id: Date.now(), content: error.message, status: 'error' } ] );
        } finally {
            setIsSaving( false );
        }
    };

    const removeNotice = ( id ) => {
        setNotices( notices.filter( n => n.id !== id ) );
    };

    return {
        settings,
        updateSettings,
        saveSettings,
        isSaving,
        notices,
        removeNotice
    };
};
