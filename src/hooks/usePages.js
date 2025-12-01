import { useState, useEffect } from '@wordpress/element';
import { fetchPages } from '../api';

export const usePages = () => {
    const [ pages, setPages ] = useState( [] );
    const [ isLoading, setIsLoading ] = useState( true );

    useEffect( () => {
        const loadPages = async () => {
            try {
                const data = await fetchPages();
                const pageOptions = data.map( ( page ) => ( {
                    label: page.title.rendered,
                    value: page.link,
                } ) );
                setPages( [ { label: 'Select a page', value: '' }, ...pageOptions ] );
            } catch ( error ) {
                console.error( 'Error loading pages:', error );
            } finally {
                setIsLoading( false );
            }
        };

        loadPages();
    }, [] );

    return { pages, isLoading };
};
