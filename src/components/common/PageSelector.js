import { useState, useEffect } from '@wordpress/element';
import { ComboboxControl, TextControl, Spinner, Button, ButtonGroup } from '@wordpress/components';
import apiFetch from '@wordpress/api-fetch';
import { addQueryArgs } from '@wordpress/url';

const PageSelector = ( { value, onChange, label, pages, isLoading } ) => {
    const [ inputType, setInputType ] = useState( 'url' ); // 'url' or 'page'
    const [ filteredOptions, setFilteredOptions ] = useState( pages );

    // Determine initial input type based on value
    useEffect( () => {
        if ( ! isLoading && pages.length > 1 ) {
             if ( value && pages.some( p => p.value === value ) ) {
                setInputType( 'page' );
            } else if ( value ) {
                setInputType( 'url' );
            }
        }
        setFilteredOptions( pages );
    }, [ pages, value, isLoading ] );

    const handleTypeChange = ( type ) => {
        setInputType( type );
        onChange( '' ); // Reset value when switching type
    };

    const handleFilterChange = ( inputValue ) => {
        const filtered = pages.filter( ( option ) =>
            option.label.toLowerCase().includes( inputValue.toLowerCase() )
        );
        setFilteredOptions( filtered );
    };

    if ( isLoading ) {
        return (
            <div className="redalo-page-selector" style={{ marginBottom: '15px' }}>
                <div style={{ display: 'flex', alignItems: 'center', gap: '10px', height: '40px' }}>
                     <Spinner /> <span style={{ color: '#666' }}>Loading pages...</span>
                </div>
            </div>
        );
    }

    return (
        <div className="redalo-page-selector" style={{ marginBottom: '15px' }}>
            <div className="redalo-selector-type" style={{ marginBottom: '15px' }}>
                <ButtonGroup>
                    <Button
                        isPrimary={ inputType === 'url' }
                        isSecondary={ inputType !== 'url' }
                        onClick={ () => handleTypeChange( 'url' ) }
                    >
                        Enter Custom URL
                    </Button>
                    <Button
                        isPrimary={ inputType === 'page' }
                        isSecondary={ inputType !== 'page' }
                        onClick={ () => handleTypeChange( 'page' ) }
                    >
                        Select Page
                    </Button>
                </ButtonGroup>
            </div>

            { inputType === 'url' ? (
                <TextControl
                    label={ label }
                    value={ value }
                    onChange={ onChange }
                    placeholder="https://example.com"
                    __nextHasNoMarginBottom
                    __next40pxDefaultSize
                />
            ) : (
                <ComboboxControl
                    label={ label }
                    value={ value }
                    options={ filteredOptions }
                    onChange={ onChange }
                    onFilterValueChange={ handleFilterChange }
                    __nextHasNoMarginBottom
                    __next40pxDefaultSize
                />
            ) }
        </div>
    );
};

export default PageSelector;
